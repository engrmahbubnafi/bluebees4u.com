<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Addon;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\Signupuser;
use App\Models\SubscriberAddon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    // Show all payments.
    public function index()
    {
        $payments = Payment::with(['subscriberAddons' => function ($query) {
            $query->leftJoin('addons', 'addons.id', 'subscriber_addons.addon_id')
                ->select('subscriber_addons.payment_id', 'addons.addon_title', 'subscriber_addons.quantity');
        }])
        //leftJoin('subscriber_addons', 'subscriber_addons.payment_id', 'payments.id')
        //leftJoin('addons', 'addons.id', 'subscriber_addons.addon_id')
            ->join('packages', 'packages.id', 'payments.payment_package')
            ->leftJoin('signupusers', 'signupusers.customer_id', 'payments.customer_id')
            ->select('payments.id',
                'payments.customer_id',
                'payments.account_number',
                'payments.amount',
                'payments.transaction_id',
                'payments.promotion_code',
                'payments.status',
                'packages.package_name',
                'signupusers.first_name',
                'signupusers.last_name',
            )
            ->get();
        // dd($payments);

        $addonsPaymentId = SubscriberAddon::get('payment_id');
        // dd($addonsPaymentId);

        return view('admin.payment.index', compact('payments', 'addonsPaymentId'));
    }

    // Create new payment.
    public function create()
    {
        $customer = Signupuser::select(['customer_id', DB::raw('CONCAT(customer_id," (Facebook: ",facebook_link,") Mobile: ",phone) as display_option')])
            ->pluck('display_option', 'customer_id')->prepend('Select One', '');
        $package = Package::select(DB::raw('CONCAT(package_name," (",price,")") as display_option'), "id")
            ->pluck('display_option', 'id')->prepend('Select One', '');
        $promotion = Promotion::select(DB::raw('CONCAT(promotion_code) as display_option'), "promotion_code")
            ->pluck('display_option', 'promotion_code')->prepend('Select One', '');
        $addons = Addon::where('status', 1)->get();

        return view('admin.payment.new-payment', compact('customer', 'package', 'promotion', 'addons'));
    }

    // Store new payment.
    public function store(PaymentStoreRequest $request)
    {
        // Validation.
        $validated = $request->validated();

        // Get the price according to Package.
        $validated['amount'] = Package::get()->where('id', $validated['payment_package'])->first()->price;

        // Promotion calculation if available:
        if ($validated['promotion_code'] != null) {
            $promotionData = Promotion::where('promotion_code', '=', $validated['promotion_code'])
                ->where('status', '=', 1)->whereDate('end_date', '>', Carbon::now())->first();
            if ($promotionData) {
                $amount = $validated['amount'];
                $unchanged = $amount;
                if ($promotionData->is_percentage == 1) {
                    $offerAmount = (($amount * $promotionData->percentage) / 100);
                } elseif ($promotionData->is_percentage == 0) {
                    $offerAmount = $promotionData->fixed_amount;
                }
                if ($promotionData->min_purchase) {
                    if ($amount >= $promotionData->min_purchase) {
                        if ($promotionData->max_amount) {
                            if ($offerAmount > $promotionData->max_amount) {
                                $offerAmount = $promotionData->max_amount;
                            }
                            $unchanged = $amount - $offerAmount;
                        }
                    }
                } else {
                    if ($promotionData->max_amount) {
                        if ($offerAmount > $promotionData->max_amount) {
                            $offerAmount = $promotionData->max_amount;
                        }
                        $unchanged = $amount - $offerAmount;
                    }
                }
                $validated['amount'] = $unchanged < 0 ? 0 : $unchanged;
            }
        }

        $payementObject = Payment::create($validated);

        $paymentId = $payementObject->id;
        $customerId = $request->customer_id;
        $this->storeAddons($request->quantity, $customerId, $paymentId);

        return redirect()->back()->with('flash_success', "Payment info saved!");
    }

    // Edit payment.
    public function edit($id)
    {
        $payment = Payment::find($id);

        return view('admin.payment.edit', compact('payment'));
    }

    // Update payment.
    public function update(PaymentUpdateRequest $request, $id)
    {
        $updatePayment = Payment::find($id);
        $updatePayment->account_number = $request->account_number;
        $updatePayment->transaction_id = $request->transaction_id;
        // Payment status will be changed to Received from Pending after updating Account Number and Transaction ID.
        $updatePayment->status = 'received';
        $updatePayment->update();

        return redirect('payments')->with('flash_success', "Pending payment now updated and status changed to Received.");
    }

    // Storing addons.
    private function storeAddons($addonsArr, $customerId, $paymentId)
    {
        if (count($addonsArr)) {
            $savableData = [];
            $i = 0;

            foreach ($addonsArr as $addonId => $quantity) {
                if ($quantity) {
                    $savableData[$i]['customer_id'] = $customerId;
                    $savableData[$i]['payment_id'] = $paymentId;
                    $savableData[$i]['addon_id'] = $addonId;
                    $savableData[$i]['quantity'] = $quantity;
                    $savableData[$i]['created_at'] = now();
                    $savableData[$i]['updated_at'] = now();
                    $i++;
                }
            }

            SubscriberAddon::insert($savableData);
        }
    }
}
