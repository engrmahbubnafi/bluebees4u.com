<?php
namespace App\Classes;

class QueenBeeSubscribers
{
    # index() will show all Queen Bee Subscribers'.
    public function index()
    {
        $queenBeeSubscribers = $this->queenBeeSubscribers();
        return view('admin.queen-bee-subscribers', compact('queenBeeSubscribers'));
    }

    # queenBeeSubscribers() will return all Queen Bee Subscribers'.
    public function queenBeeSubscribers()
    {
        return $this->allSubscribers()->where('package', 3);
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
