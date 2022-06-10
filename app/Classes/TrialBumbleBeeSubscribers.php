<?php
namespace App\Classes;

class TrialBumbleBeeSubscribers
{
    # index() will show all free trial Bumble Bee Subscribers.
    public function index()
    {
        $trialBumbleBeeSubscribers = $this->trialBumbleBeeSubscribers();
        return view('admin.bluebees4u.trial.trial-bumble-bee-subscribers', compact('trialBumbleBeeSubscribers'));
    }

    # trialBumbleBeeSubscribers() will return all free trial Bumble Bee Subscribers'.
    public function trialBumbleBeeSubscribers()
    {
        return $this->allTrialSubscribers()->where('package', 2);
    }

    # allTrialSubscribers() will return all free trial subscribers'.
    public function allTrialSubscribers()
    {
        /**
         * @param \App\Classes\TrialSubscribers
         */
        return (new TrialSubscribers)->allTrialSubscribers();
    }
}
