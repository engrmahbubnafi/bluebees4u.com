<?php
namespace App\Classes;

class PaidQueenBeeSubscribers
{
    # index() will show all Queen Bee Subscribers'.
    public function index()
    {
        $paidQueenBeeSubscribers = $this->paidQueenBeeSubscribers();
        return view('admin.bluebees4u.paid.paid-queen-bee-subscribers', compact('paidQueenBeeSubscribers'));
    }

    # paidQueenBeeSubscribers() will return all Queen Bee Subscribers'.
    public function paidQueenBeeSubscribers()
    {
        return $this->allPaidSubscribers()->where('payment_package', 3);
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
