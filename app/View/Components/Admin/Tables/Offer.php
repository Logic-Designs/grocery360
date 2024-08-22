<?php

namespace App\View\Components\Admin\Tables;

use Illuminate\View\Component;

class Offer extends Component
{
    public $offers;

    public function __construct($offers)
    {
        $this->offers = $offers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.tables.offer');
    }
}
