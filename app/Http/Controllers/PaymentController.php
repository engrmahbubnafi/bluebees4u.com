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
use App\Models\ThirdParty;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class PaymentController extends Controller
{
    // Save addons to database
    private function storeAddons($addonsArr, $customerId, $paymentId)
    {
        $previousEntries = SubscriberAddon::where('payment_id', $paymentId)->exists();

        if ($previousEntries) {
            SubscriberAddon::where('payment_id', $paymentId)->delete();
        }

        if ($addonsArr && count($addonsArr)) {
            $savableData = [];
            $i = 0;

            foreach ($addonsArr as $addonId => $quantity) {
                if ($quantity) {
                    $savableData[$i]['customer_id'] = $customerId;
                    $savableData[$i]['payment_id'] = $paymentId;
                    $savableData[$i]['addon_id'] = $addonId;
                    $savableData[$i]['quantity'] = $quantity;
                    $savableData[$i]['price'] = $quantity * Addon::get()->where('id', $addonId)->first()->addon_price;
                    $savableData[$i]['created_at'] = now();
                    $savableData[$i]['updated_at'] = now();
                    $i++;
                }
            }

            SubscriberAddon::insert($savableData);
        }
    }

    /**
     * Save 3rd parties to database
     *
     * @param int $paymentId
     * @param array $thirdPartyArray
     */
    private function storeThirdParty(int $paymentId, array $thirdPartyArray)
    {
        $previousEntries = ThirdParty::where('payment_id', $paymentId)->exists();

        if ($previousEntries) {
            ThirdParty::where('payment_id', $paymentId)->delete();
        }

        (array) $data = [];

        foreach ($thirdPartyArray as $key => $value) {
            if ($value['name'] && $value['amount']) {
                $data[$key]['name'] = $value['name'];
                $data[$key]['amount'] = $value['amount'];
                $data[$key]['payment_id'] = $paymentId;
            }
        }

        ThirdParty::insert($data);
    }

    // Show all payments.
    public function index()
    {
        $addonsSub = SubscriberAddon::leftJoin('addons', 'addons.id', 'subscriber_addons.addon_id')
            ->select(
                'subscriber_addons.payment_id',
                DB::raw('group_concat(
                        DISTINCT CONCAT(addons.addon_title," - ",subscriber_addons.quantity)
                        ORDER BY subscriber_addons.payment_id
                        SEPARATOR "<br>"
                    ) as name'
                )
            )
            ->groupBy('subscriber_addons.payment_id');

        $thirdPatiesSub = ThirdParty::select(
            'third_parties.payment_id',
            DB::raw('group_concat(
                DISTINCT CONCAT(third_parties.name," - ",third_parties.amount)
                ORDER BY third_parties.payment_id
                SEPARATOR "<br>"
            ) as name'
            )
        )
            ->groupBy('payment_id');

        $payments = Payment::join('packages', 'packages.id', 'payments.payment_package')
            ->leftJoin('signupusers', 'signupusers.customer_id', 'payments.customer_id')
            ->leftJoinSub($addonsSub, 'subscriber_addons', function ($join) {
                $join->on('subscriber_addons.payment_id', '=', 'payments.id');
            })
            ->leftJoinSub($thirdPatiesSub, 'third_parties', function ($join) {
                $join->on('third_parties.payment_id', '=', 'payments.id');
            })
            ->select(
                'payments.id',
                'payments.customer_id',
                'payments.account_number',
                'payments.amount',
                'payments.transaction_id',
                'payments.promotion_code',
                'payments.status',
                'payments.additional_amount_note',
                'payments.additional_amount',
                'packages.package_name',
                'signupusers.first_name',
                'signupusers.last_name',
                'subscriber_addons.name as addons',
                'third_parties.name as thirdparties'
            )
            ->get();

        $addonsPaymentId = SubscriberAddon::get('payment_id');

        $isAdministrator = request()->user()->isAdministrator();

        return view('admin.payment.index', compact('payments', 'addonsPaymentId', 'isAdministrator'));
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
        $validated = $request->validated();
        $packagePrice = (float) Package::get()->where('id', $validated['payment_package'])->first()->price;
        $validated['package_price'] = $packagePrice;
        $addonGrandPrice = 0;

        // Calculate Add On Grand Price.
        if ($request->quantity && count($request->quantity)) {
            foreach ($request->quantity as $key => $value) {
                $addonPrice = (float) Addon::get()->where('id', $key)->first()->addon_price;
                $addonTotalPrice = $addonPrice * $value;
                $addonGrandPrice = $addonGrandPrice + $addonTotalPrice;
            }
        }

        $additionalAmount = ($request->additional_amount < 0 || $request->additional_amount == null) ? 0 : $request->additional_amount;

        // Promotion calculation if available:
        if ($validated['promotion_code'] != null) {
            $promotionData = Promotion::where('promotion_code', '=', $validated['promotion_code'])
                ->where('status', '=', 1)->whereDate('end_date', '>', Carbon::now())->first();
            if ($promotionData) {
                $amount = $packagePrice;
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
                $packagePrice = $unchanged < 0 ? 0 : $unchanged;
            }
        }

        $validated['addon_price'] = (float) $addonGrandPrice;
        $validated['amount'] = (float) $packagePrice + (float) $addonGrandPrice + (float) $additionalAmount;
        $validated['additional_amount'] = (float) $request->additional_amount;
        $validated['additional_amount_note'] = (string) $request->additional_amount_note;

        // Log user name
        $validated['created_by'] = Auth()->id();
        $validated['updated_by'] = Auth()->id();

        // Save data
        $payementObject = Payment::create($validated);

        // Get payment ID of just created payment
        $paymentId = $payementObject->id;

        // Get just created payment's customer ID
        $customerId = $request->customer_id;

        // Save add on to database
        $this->storeAddons($request->quantity, $customerId, $paymentId);

        // Save 3rd parties to database
        $this->storeThirdParty($paymentId, $request->third_party);

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

    public function systemAdminEdit($paymentId)
    {

        $payment = Payment::with('ThirdParties')
            ->exclude('amount')
            ->findOrFail($paymentId);

        $customer = Signupuser::select(['customer_id', DB::raw('CONCAT(customer_id," (Facebook: ",facebook_link,") Mobile: ",phone) as display_option')])
            ->pluck('display_option', 'customer_id')->prepend('Select One', '');

        $package = Package::select(DB::raw('CONCAT(package_name," (",price,")") as display_option'), "id")
            ->pluck('display_option', 'id')->prepend('Select One', '');

        $promotion = Promotion::select(DB::raw('CONCAT(promotion_code) as display_option'), "promotion_code")
            ->pluck('display_option', 'promotion_code')->prepend('Select One', '');

        $addons = Addon::join('subscriber_addons', 'subscriber_addons.addon_id', 'addons.id')
            ->where('subscriber_addons.payment_id', $paymentId)
            ->select(
                'addons.id',
                'addons.addon_title',
                'subscriber_addons.quantity'
            )
            ->get();

        return view('admin.payment.system-admin-edit', compact('payment', 'customer', 'package', 'promotion', 'addons'));
    }

    public function systemAdminEditUpdate(PaymentStoreRequest $request, Payment $payment)
    {
        $validated = $request->validated();

        $packagePrice = (float) Package::get()->where('id', $validated['payment_package'])->first()->price;
        $validated['package_price'] = $packagePrice;
        $addonGrandPrice = 0;

        // Calculate Add On Grand Price.
        if ($request->quantity && count($request->quantity)) {
            foreach ($request->quantity as $key => $value) {
                $addonPrice = (float) Addon::get()->where('id', $key)->first()->addon_price;
                $addonTotalPrice = $addonPrice * $value;
                $addonGrandPrice = $addonGrandPrice + $addonTotalPrice;
            }
        }

        $additionalAmount = ($request->additional_amount < 0 || $request->additional_amount == null) ? 0 : $request->additional_amount;

        // Promotion calculation if available:
        if ($validated['promotion_code'] != null) {
            $promotionData = Promotion::where('promotion_code', '=', $validated['promotion_code'])
                ->where('status', '=', 1)->whereDate('end_date', '>', Carbon::now())->first();
            if ($promotionData) {
                $amount = $packagePrice;
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
                $packagePrice = $unchanged < 0 ? 0 : $unchanged;
            }
        }

        $validated['addon_price'] = (float) $addonGrandPrice;
        $validated['amount'] = (float) $packagePrice + (float) $addonGrandPrice + (float) $additionalAmount;
        $validated['additional_amount'] = (float) $request->additional_amount;
        $validated['additional_amount_note'] = (string) $request->additional_amount_note;

        // Log user name
        $validated['updated_by'] = auth()->id();

        $payment->update($validated);

        $this->storeAddons($request->quantity, $request->customer_id, $payment->id);

        $this->storeThirdParty($payment->id, $request->third_party);

        return redirect('payments')->with('flash_success', "Payment edited successfully by System Admin!");
    }

    public function destroy(Payment $payment)
    {
        try {
            // Soft delete the payment.
            $payment->delete();

            // Show success message if $payment is soft deleted.
            if ($payment->trashed()) {
                return back()
                    ->with('flash_success', "Payment deleted successfully!");
            }
        } catch (Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong deleting data!',
                'error' => [$th->getMessage()],
            ]);
        }
    }
}
