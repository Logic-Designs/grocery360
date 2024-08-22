<?php

namespace App\View\Components\admin\Model;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class EditAdmin extends Component
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
        return view('components.admin.model.edit-admin');
    }
}
