<?php
namespace App\Classes;

use App\Models\Signupuser;
use Carbon\Carbon;

class NewSignUpUsers
{
    # index() will show new signed up users' list.
    public function index()
    {
        $newSignedUpUsers = $this->newSignUpUsers();
        return view('admin.new-signedupusers', compact('newSignedUpUsers'));
    }

    # newSignedUpUsers() will return all new signed up users' .
    public function newSignUpUsers()
    {
        return Signupuser::get()->where("created_at", ">", Carbon::now()->subDay());
    }
}
