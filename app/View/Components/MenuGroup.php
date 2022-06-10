<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuGroup extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $children;
    public $title;

    public function __construct($children, $title = null)
    {
        $this->children = $children;
        $this->title = $title;
    }

    public function hasChildren()
    {
        return !!$this->children->count();
    }

    public function className()
    {
        if ($this->children->count()) {
            return 'has-child-item';
        }
        return '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-group');
    }
}