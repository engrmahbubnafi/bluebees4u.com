<?php

namespace App\Http\Controllers;

use App\Classes\Dashboard;
use App\Classes\NewPaidSubscribers;
use App\Classes\CurrentPaidSubscribers;
use App\Classes\SubscriptionEnded;
use App\Classes\NewSignUpUsers;
use App\Classes\NewSubscribers;
use App\Classes\NewTrialSubscribers;
use App\Classes\PaidBumbleBeeSubscribers;
use App\Classes\PaidHoneyBeeSubscribers;
use App\Classes\PaidQueenBeeSubscribers;
use App\Classes\PaidSubscribers;
use App\Classes\SignUpUsers;
use App\Classes\Subscribers;
use App\Classes\TrialBumbleBeeSubscribers;
use App\Classes\TrialHoneyBeeSubscribers;
use App\Classes\TrialQueenBeeSubscribers;
use App\Classes\TrialSubscribers;
use App\Classes\ExpiredSubscribers;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    # To show dashboard.
    public function index()
    {
        /**
         * @param \App\Classes\Dashboard
         */
        return (new Dashboard)->index();
    }

    # To show all signed up users.
    public function signupusers()
    {
        /**
         * @param \App\Classes\SignUpUsers
         */
        return (new SignUpUsers)->index();

    }

    # To show all new signed up users.
    public function newSignedUpUsers()
    {
        /**
         * @param \App\Classes\NewSignUpUsers
         */
        return (new NewSignUpUsers)->index();

    }

    # To show all Subscribers.
    public function subscribers()
    {
        /**
         * @param \App\Classes\Subscribers
         */
        return (new Subscribers)->index();

    }

    # To show all new subscribers.
    public function newSubscribers()
    {
        /**
         * @param \App\Classes\NewSubscribers
         */
        return (new NewSubscribers)->index();

    }

    # To show all current paid subscribers.
    public function currentPaidSubscribers() {
        /**
         * @param \App\Classes\CurrentPaidSubscribers
         */
        
        return (new CurrentPaidSubscribers)->index();
    }

    # To show all paid subscribers whose subscription is ended.
    public function subscriptionEnded() {
        /**
         * @param \App\Classes\SubscriptionEnded
         */
        
        return (new SubscriptionEnded)->index();
    }

    // To show all free trial subscribers.
    // public function trialSubscribers()
    // {
    //     /**
    //      * @param \App\Classes\TrialSubscribers
    //      */
    //     return (new TrialSubscribers)->index();

    // }

    // To show all new free trial subscribers.
    // public function newTrialSubscribers()
    // {
    //     /**
    //      * @param \App\Classes\NewTrialSubscribers
    //      */
    //     return (new NewTrialSubscribers)->index();

    // }

    // To show all paid subscribers.
    public function paidSubscribers()
    {
        /**
         * @param \App\Classes\PaidSubscribers
         */
        return (new PaidSubscribers)->index();

    }

    // To show all new paid subscribers.
    public function newPaidSubscribers()
    {
        /**
         * @param \App\Classes\NewPaidSubscribers
         */
        return (new NewPaidSubscribers)->index();

    }

    # To show all free trial Honey Bee Subscribers.
    // public function trialHoneyBeeSubscribers()
    // {
    //     /**
    //      * @param \App\Classes\TrialHoneyBeeSubscribers
    //      */
    //     return (new TrialHoneyBeeSubscribers)->index();

    // }

    # To show all paid Honey Bee Subscribers.
    public function paidHoneyBeeSubscribers()
    {
        /**
         * @param \App\Classes\PaidHoneyBeeSubscribers
         */
        return (new PaidHoneyBeeSubscribers)->index();

    }

    # To show all free trial Bumble Bee Subscribers.
    // public function trialBumbleBeeSubscribers()
    // {
    //     /**
    //      * @param \App\Classes\TrialBumbleBeeSubscribers
    //      */
    //     return (new TrialBumbleBeeSubscribers)->index();

    // }

    # To show all paid Bumble Bee Subscribers.
    public function paidBumbleBeeSubscribers()
    {
        /**
         * @param \App\Classes\PaidBumbleBeeSubscribers
         */
        return (new PaidBumbleBeeSubscribers)->index();

    }

    # To show all free trial Queen Bee Subscribers.
    // public function trialQueenBeeSubscribers()
    // {
    //     /**
    //      * @param \App\Classes\TrialQueenBeeSubscribers
    //      */
    //     return (new TrialQueenBeeSubscribers)->index();

    // }

    # To show all paid Queen Bee Subscribers.
    public function paidQueenBeeSubscribers()
    {
        /**
         * @param \App\Classes\PaidQueenBeeSubscribers
         */
        return (new PaidQueenBeeSubscribers)->index();

    }

    // To show all expired subscribers.
    // public function expiredSubscribers(){
    //     /**
    //      * @param \App\Classes\ExpiredSubscribers 
    //      */
    //     return (new ExpiredSubscribers)->index();
    // }

}
