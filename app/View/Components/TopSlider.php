<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopSlider extends Component
{
    public $sliderData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sliderData=null)
    {
        $this->sliderData = $sliderData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
//        dd($this->sliderData);
        return view('components.top-slider');
    }
}
