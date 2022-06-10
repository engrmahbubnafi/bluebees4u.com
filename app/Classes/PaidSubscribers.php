<?php
namespace App\Classes;

use App\Models\Payment;

class PaidSubscribers
{
    # index() will show all paid subscribers'.
    public function index()
    {
        $paidSubscribers = $this->allPaidSubscribers();
        // dd($paidSubscribers);
        
        return view('admin.bluebees4u.paid.paid-subscribers', compact('paidSubscribers'));
    }

    # allPaidSubscribers() will return all paid subscribers'.
    public function allPaidSubscribers()
    {
        $uniquePayments = Payment::selectRaw(
            'MAX(id) as id'
        )
            ->groupBy('customer_id');

        return Payment::select(
                'signupusers.first_name',
                'signupusers.last_name',
                'signupusers.phone',
                'signupusers.email',
                'signupusers.facebook_link',
                'signupusers.product_category',
                'packages.package_name',
                'payments.id',
                'payments.customer_id',
                'payments.payment_package',
                'payments.created_at',
                'payments.updated_at',
            )
            ->joinSub($uniquePayments, 'upayments', function ($query) {
                $query->on('upayments.id', '=', 'payments.id');
            })
            ->join('signupusers', 'payments.customer_id', '=', 'signupusers.customer_id')
            ->join('packages', 'packages.id', '=', 'payments.payment_package')
            ->orderBy('payments.updated_at', 'DESC')
            ->get();
    }
}
