<?php
namespace App\Classes;

class TrialHoneyBeeSubscribers
{
    # index() will show all free trial Honey Bee Subscribers.
    public function index()
    {
        $trialHoneyBeeSubscribers = $this->trialHoneyBeeSubscribers();
        return view('admin.bluebees4u.trial.trial-honey-bee-subscribers', compact('trialHoneyBeeSubscribers'));
    }

    # trialHoneyBeeSubscribers() will return all free trial Honey Bee Subscribers'.
    public function trialHoneyBeeSubscribers()
    {
        return $this->allTrialSubscribers()->where('package', 1);
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
