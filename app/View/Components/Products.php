<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Products extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $datas;
    public $dataNum;
    public $menuData;
    public function __construct($datas, $dataNum,$menuData=null)
    {
        $this->datas   = $datas;
        $this->dataNum = $dataNum;
        $this->menuData = $menuData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.products');
    }
}
