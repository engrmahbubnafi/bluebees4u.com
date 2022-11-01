<?php
namespace App\Classes;

use \App\Classes\PaidSubscribers;

class SubscriptionEnded
{
    public function index()
    {
        $subscriptionEnded = $this->allPaidSubscribers()->where('updated_at', '<', now()->subDays(30));

        return view('admin.bluebees4u.paid.subscription-ended', compact('subscriptionEnded'));
    }

    public function allPaidSubscribers()
    {
        /**
         * @param \App\Classes\PaidSubscribers
         */
        return (new PaidSubscribers)->allPaidSubscribers();
    }
}
