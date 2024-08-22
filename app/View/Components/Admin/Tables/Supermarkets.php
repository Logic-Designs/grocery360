<?php

namespace App\View\Components\Admin\Tables;

use Illuminate\View\Component;

class Supermarkets extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $supermarkets)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.tables.supermarkets');
    }
}
