<?php
namespace App\Classes;

use App\Models\Signupuser;

class SignUpUsers
{
    # index() will show all signupusers with associated package name and subscription data.
    public function index()
    {
        $signupusers = $this->signupusers();
        // dd($signupusers);
        
        return view('admin.bluebees4u.signupusers', compact('signupusers'));
    }

    // signupusers() will return all signup users with associated package and subscribers information.
    public function signupusers()
    {
    return Signupuser::leftJoin('subscribers', 'subscribers.signupuser_id', 'signupusers.id')
        ->leftJoin('packages', 'packages.id', 'signupusers.signupuser_package')
        ->leftJoin('payments', 'payments.customer_id', 'signupusers.customer_id')
        ->select(
            'signupusers.customer_id',
            'signupusers.first_name',
            'signupusers.last_name',
            'signupusers.phone',
            'signupusers.email',
            'signupusers.facebook_link',
            'signupusers.created_at',
            'signupusers.signupuser_package',
            'signupusers.product_category',
            'packages.package_name',
            'payments.payment_package'
        )
        ->groupBy('signupusers.customer_id')
        ->get();
    }
}
