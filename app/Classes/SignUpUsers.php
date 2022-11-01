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
        ->leftJoin('packages as signupuser_package', 'signupuser_package.id', 'signupusers.signupuser_package')
        ->leftJoin('payments', 'payments.customer_id', 'signupusers.customer_id')
        ->leftJoin('packages as payment_package', 'payment_package.id', 'payments.payment_package')
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
            'payment_package.package_name as payment_package_name',
            'signupuser_package.package_name as signupuser_package_name',
            'payments.payment_package'
        )
        ->groupBy('signupusers.customer_id')
        ->get();
    }
}
