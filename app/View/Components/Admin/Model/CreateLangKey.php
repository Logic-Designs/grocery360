<?php

namespace App\View\Components\Admin\Model;

use Illuminate\View\Component;

class CreateLangKey extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $languages;

    public function __construct()
    {
        $this->languages = config('app.available_language');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.model.create-lang-key');
    }
}
