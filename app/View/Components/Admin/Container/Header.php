<?php

namespace App\View\Components\Admin\Container;

use Illuminate\View\Component;

class Header extends Component
{

    public $title;
    public $name;
    public $back;
    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name = null, $back = null, $model = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->back = $back;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.container.header');
    }
}
