<?php
namespace App\Classes;

use Carbon\Carbon;

class NewTrialSubscribers
{
    # index() will show all new trial subscribers' list.
    public function index()
    {
        $newTrialSubscribers = $this->newTrialSubscribers();
        return view('admin.bluebees4u.trial.new-trial-subscribers', compact('newTrialSubscribers'));
    }

    # newTrialSubscribers() will return all new trial subscribers'.
    public function newTrialSubscribers()
    {
        return $this->allTrialSubscribers()->where('created_at', ">", Carbon::now()->subDay());
    }

    # allTrialSubscribers() will return all trial subscribers'.
    public function allTrialSubscribers()
    {
        /**
         * @param \App\Classes\TrialSubscribers
         */
        return (new TrialSubscribers)->allTrialSubscribers();
    }
}
