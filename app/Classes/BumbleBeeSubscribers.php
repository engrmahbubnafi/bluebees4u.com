<?php
namespace App\Classes;

class BumbleBeeSubscribers
{
    # index() will show all Bumble Bee Subscribers'.
    public function index()
    {
        $bumbleBeeSubscribers = $this->bumbleBeeSubscribers();
        return view('admin.bumble-bee-subscribers', compact('bumbleBeeSubscribers'));
    }

    # bumbleBeeSubscribers() will return all Bumble Bee Subscribers'.
    public function bumbleBeeSubscribers()
    {
        return $this->allSubscribers()->where('package', 2);
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
