<?php

namespace App\View\Components\Admin\Tables;

use Illuminate\View\Component;

class Sliders extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sliders;
    public function __construct($sliders)
    {
        $this->sliders = $sliders;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.tables.sliders');
    }
}
