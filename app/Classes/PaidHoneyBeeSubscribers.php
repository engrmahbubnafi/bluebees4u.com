<?php
namespace App\Classes;

class PaidHoneyBeeSubscribers
{
    # index() will show all Honey Bee Subscribers.
    public function index()
    {
        $paidHoneyBeeSubscribers = $this->paidHoneyBeeSubscribers();
        return view('admin.bluebees4u.paid.paid-honey-bee-subscribers', compact('paidHoneyBeeSubscribers'));
    }

    # paidHoneyBeeSubscribers() will return all Honey Bee Subscribers'.
    public function paidHoneyBeeSubscribers(){
        return $this->allPaidSubscribers()->where('payment_package', 1);
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
