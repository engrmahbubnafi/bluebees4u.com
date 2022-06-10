<?php
namespace App\Classes;

use Carbon\Carbon;

class NewPaidSubscribers
{
    # index() will show all new paid subscribers' list.
    public function index()
    {
        $newPaidSubscribers = $this->newPaidSubscribers();
        return view('admin.bluebees4u.paid.new-paid-subscribers', compact('newPaidSubscribers'));
    }

    # newPaidSubscribers() will return all new paid subscribers'.
    public function newPaidSubscribers()
    {
        return $this->allPaidSubscribers()->where('created_at', ">", Carbon::now()->subDay());
    }

    # allPaidSubscribers() will return all paid subscribers'.
    public function allPaidSubscribers()
    {
        /**
         * @param \App\Classes\PaidSubscribers
         */
        return (new PaidSubscribers)->allPaidSubscribers();
    }
}
