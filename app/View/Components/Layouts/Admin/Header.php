<?php

namespace App\View\Components\Layouts\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    public $admin;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->admin = Auth::guard('admin')->user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.admin.header');
    }
}
