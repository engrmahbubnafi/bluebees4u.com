<?php
namespace App\Classes;

use Illuminate\Support\Facades\DB;

class TrialSubscribers
{
    # index() will show all trial subscribers.
    public function index()
    {
        $trialSubscribers = $this->allTrialSubscribers();
        return view('admin.bluebees4u.trial.trial-subscribers', compact('trialSubscribers'));
    }

    # allTrialSubscribers() will return all free trial subscribers.
    public function allTrialSubscribers()
    {
        return DB::table('subscribers')
            ->whereDate('trial_start_at', '<=', now()->format('Y-m-d'))->whereDate('trial_expire_at', '>=', now()->format('Y-m-d')) // It will check whether current time is between 'Trial Start Date' and 'Trial Expire Date'.
            ->join('packages', 'subscribers.package_id', '=', 'packages.id')
            ->rightJoin('signupusers', 'subscribers.signupuser_id', '=', 'signupusers.id')
            ->get();
    }
}
