<?php

namespace App\View\Components\Admin\Model;

use Illuminate\View\Component;

class Description extends Component
{
    public $description;
    public $name;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($description, $id, $name = "Description")
    {
        $this->description = $description;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.model.description');
    }
}
