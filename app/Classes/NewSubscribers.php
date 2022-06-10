<?php
namespace App\Classes;

use Carbon\Carbon;

class NewSubscribers
{
    # index() will show all new subscribers' list.
    public function index()
    {
        $newSubscribers = $this->newSubscribers();
        return view('admin.new-subscribers', compact('newSubscribers'));
    }

    # newSubscribers() will return all new subscribers'.
    public function newSubscribers()
    {
        return $this->allSubscribers()->where('created_at', ">", Carbon::now()->subDay());
    }

    # allSubscribers() will return all subscribers'.
    public function allSubscribers()
    {
        /**
         * @param \App\Classes\Subscribers
         */
        return (new Subscribers)->allSubscribers();
    }
}
