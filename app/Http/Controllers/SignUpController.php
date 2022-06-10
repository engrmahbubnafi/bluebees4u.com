<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Package;
use App\Models\EmptyObj;
use App\Models\Signupuser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SignupuserAddon;

class SignUpController extends Controller
{

    public function index()
    {
        $menuObj = (new EmptyObj)->setRawAttributes([
            'name' => 'Sign Up to Our Service',
        ]);

        // Fetching packages' information.
        $packageCollection = Package::where('status',1)->where('is_signup_able',1)->get();
        $packageArr = $packageCollection->pluck('package_name','id')->prepend('Select Your Preferred Package', '');
        $packagePriceArr = json_encode($packageCollection->pluck('price','id'));

        // Fetching addons' information.
        $addons = Addon::where('status', 1)->get();

        return view('front_site.signup', compact('packagePriceArr', 'packageArr', 'menuObj', 'addons'));
    }

    public function storeSignup(Request $request)
    {
        $validated = $this->validate($request, [
            "first_name" => "required|max:25",
            "last_name" => "required|max:25",
            "email" => "required",
            "phone" => "required|numeric|digits:11",
            "facebook_link" => "required|unique:signupusers,facebook_link",
            "product_category" => "required",
            "signupuser_package" => "required",
            "referral_id" => "nullable",
            // "payment" => "nullable",
            "transaction_id" => "nullable",
        ]);
        $signupuser = Signupuser::create($validated);

        $dateNow = now()->format('Ymd');
        $formatableUserId = Str::padLeft($signupuser->id, 6, '0');
        $packageId = $signupuser->signupuser_package;
        $customerId =  $dateNow . $packageId . $formatableUserId;
        $signupuser->customer_id = $customerId;
        $signupuser->save();

        $this->storeAddons($request->addon_quantity, $packageId, $customerId);

        return redirect()->back()->with('flash_success', "Thank you for signing up with us. Contact with you soon");
    }

    private function storeAddons($addonsArr, $packageId, $customerId) {
        if (count($addonsArr)) {
            $savableData = [];
            $i=0;

            foreach ($addonsArr as $addonsId=>$quantity) {
                if ($quantity) {
                    $savableData[$i]['customer_id'] = $customerId;
                    $savableData[$i]['addon_id'] = $addonsId;
                    $savableData[$i]['quantity'] = $quantity;
                    $savableData[$i]['created_at'] = now();
                    $savableData[$i]['updated_at'] = now();
                    $i++;
                }                
            }

            SignupuserAddon::insert($savableData);
        }
    }
}
