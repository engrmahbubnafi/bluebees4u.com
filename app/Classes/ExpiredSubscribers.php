<?php
namespace App\Classes;

use App\Models\Subscriber;

class ExpiredSubscribers
{
    # index() will show all expired subscribers.
    public function index()
    {
        $expiredSubscribers = $this->allExpiredSubscribers();
        return view('admin.bluebees4u.expired-subscribers', compact('expiredSubscribers'));
    }

    # allExpiredSubscribers() will return all expired subscribers.
    public function allExpiredSubscribers()
    {
        /**
         * @param \App\Classes\Subscribers
         */

        return (new Subscribers)->allSubscribers()->where('expiry_date', '<', now()->format('Y-m-d'));
    }
}
