<?php

namespace App\View\Components\Layouts\Admin;

use Illuminate\View\Component;

class Setting extends Component
{
    public $admin;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($admin)
    {
        $this->admin =  $admin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.admin.setting');
    }
}
