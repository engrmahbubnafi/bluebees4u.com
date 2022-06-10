<?php
namespace App\Classes;

class PaidBumbleBeeSubscribers
{
    # index() will show all paid Bumble Bee Subscribers'.
    public function index()
    {
        $paidBumbleBeeSubscribers = $this->paidBumbleBeeSubscribers();
        return view('admin.bluebees4u.paid.paid-bumble-bee-subscribers', compact('paidBumbleBeeSubscribers'));
    }

    # paidBumbleBeeSubscribers() will return all Bumble Bee Subscribers'.
    public function paidBumbleBeeSubscribers(){
        return $this->allPaidSubscribers()->where('payment_package', 2);
    }

    # allPaidSubscribers() will return all subscribers'.
    public function allPaidSubscribers()
    {
        /**
         * @param \App\Classes\PaidSubscribers
         */
        return (new PaidSubscribers)->allPaidSubscribers();
    }
}
