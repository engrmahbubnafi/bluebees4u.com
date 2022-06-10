<?php 

namespace App\Classes;

use \App\Classes\PaidSubscribers;

class CurrentPaidSubscribers {
    # index() will show the list of all current paid subscribers.
    public function index() {
        $currentPaidSubscribers = $this->allPaidSubscribers()->where('updated_at', '>', now()->subDays(30));

        return view('admin.bluebees4u.paid.current-paid-subscribers', compact('currentPaidSubscribers'));
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