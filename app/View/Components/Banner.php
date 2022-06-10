<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $dataArr;
    public function __construct($dataArr)
    {
        $this->dataArr = $dataArr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}