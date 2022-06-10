<?php
namespace App\Classes;

use App\Models\Payment;

class Dashboard
{
    # index() will show Dashboard with all necessary data.
    public function index()
    {
        $totalSignUpUsers = (new SignUpUsers)->signupusers()->count() ?? 0;
        $totalNewSignUpUsers = (new NewSignUpUsers)->newSignUpUsers()->count() ?? 0;
        $totalSubscribers = (new Subscribers)->allSubscribers()->count() ?? 0;
        $totalNewSubscribers = (new NewSubscribers)->newSubscribers()->count() ?? 0;
        $totalTrialSubscribers = (new TrialSubscribers)->allTrialSubscribers()->count() ?? 0;
        $totalNewTrialSubscribers = (new NewTrialSubscribers)->newTrialSubscribers()->count() ?? 0;
        $totalPaidSubscribers = (new PaidSubscribers)->allPaidSubscribers()->count() ?? 0;
        $totalNewPaidSubscribers = (new NewPaidSubscribers)->newPaidSubscribers()->count() ?? 0;
        $totalTrialHoneyBeeSubscribers = (new TrialHoneyBeeSubscribers)->trialHoneyBeeSubscribers()->count() ?? 0;
        $totalTrialBumbleBeeSubscribers = (new TrialBumbleBeeSubscribers)->trialBumbleBeeSubscribers()->count() ?? 0;
        $totalTrialQueenBeeSubscribers = (new TrialQueenBeeSubscribers)->trialQueenBeeSubscribers()->count() ?? 0;
        $totalExpiredSubscribers = (new ExpiredSubscribers)->allExpiredSubscribers()->count() ?? 0;
        $totalPaidHoneyBeeSubscribers = (new PaidHoneyBeeSubscribers)->paidHoneyBeeSubscribers()->count() ?? 0;
        $totalPaidBumbleBeeSubscribers = (new PaidBumbleBeeSubscribers)->paidBumbleBeeSubscribers()->count() ?? 0;
        $totalPaidQueenBeeSubscribers = (new PaidQueenBeeSubscribers)->paidQueenBeeSubscribers()->count() ?? 0;
        $totalIncome = Payment::sum('amount');
        return view('admin.dashboard', compact('totalSignUpUsers', 'totalNewSignUpUsers', 'totalSubscribers', 'totalNewSubscribers', 'totalTrialSubscribers', 'totalNewTrialSubscribers', 'totalPaidSubscribers', 'totalNewPaidSubscribers', 'totalTrialHoneyBeeSubscribers', 'totalTrialBumbleBeeSubscribers', 'totalTrialQueenBeeSubscribers', 'totalExpiredSubscribers', 'totalPaidHoneyBeeSubscribers', 'totalPaidBumbleBeeSubscribers', 'totalPaidQueenBeeSubscribers', 'totalIncome'));
    }
}
