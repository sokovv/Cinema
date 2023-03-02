<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $id;
    public $route;
    public $name;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$id, $route,$name, $value)
    {
        $this->title = $title;
        $this->id = $id;
        $this->route = $route;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
