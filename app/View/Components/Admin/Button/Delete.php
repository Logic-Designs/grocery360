<?php

namespace App\View\Components\Admin\Button;

use Illuminate\View\Component;

class Delete extends Component
{
    public string $route;
    public int $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $id)
    {
        $this->route = $route;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.button.delete');
    }
}
