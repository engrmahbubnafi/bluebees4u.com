<?php
namespace App\Classes;

use App\Models\Subscriber;

class Subscribers
{
    # index() will show all subscription data with associated package and signupuser information.
    public function index()
    {
        $subscribers = $this->allSubscribers();

        return view('admin.bluebees4u.subscribers', compact('subscribers'));
    }

    # allSubscribers() will return all subscription data with associated package and signupuser information.
    public function allSubscribers()
    {
        return Subscriber::rightJoin('signupusers', 'signupusers.id', '=', 'subscribers.signupuser_id')
            ->join('packages', 'packages.id', '=', 'subscribers.package_id')
            ->select(
                'signupusers.customer_id',
                'signupusers.first_name',
                'signupusers.last_name',
                'signupusers.email',
                'signupusers.phone',
                'signupusers.facebook_link',
                'signupusers.product_category',
                'signupusers.signupuser_package',
                'signupusers.created_at',
                'subscribers.starting_date',
                'subscribers.expiry_date',
                'subscribers.trial_start_at',
                'subscribers.trial_expire_at',
                'packages.package_name'
            )
            ->get();
    }
}
