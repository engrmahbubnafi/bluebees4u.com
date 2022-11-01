<?php
namespace App\Classes;

class HoneyBeeSubscribers
{
    # index() will show all Honey Bee Subscribers.
    public function index()
    {
        $honeyBeeSubscribers = $this->honeyBeeSubscribers();
        return view('admin.honey-bee-subscribers', compact('honeyBeeSubscribers'));
    }

    # honeyBeeSubscribers() will return all Honey Bee Subscribers'.
    public function honeyBeeSubscribers(){
        return $this->allSubscribers()->where('package', 1);
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
