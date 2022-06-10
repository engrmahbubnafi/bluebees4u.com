<?php
namespace App\Classes;

class TrialQueenBeeSubscribers
{
    # index() will show all free trial Queen Bee Subscribers.
    public function index()
    {
        $trialQueenBeeSubscribers = $this->trialQueenBeeSubscribers();
        return view('admin.bluebees4u.trial.trial-queen-bee-subscribers', compact('trialQueenBeeSubscribers'));
    }

    # trialQueenBeeSubscribers() will return all free trial Queen Bee Subscribers'.
    public function trialQueenBeeSubscribers()
    {
        return $this->allTrialSubscribers()->where('package', 3);
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
