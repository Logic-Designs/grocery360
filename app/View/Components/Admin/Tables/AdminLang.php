<?php

namespace App\View\Components\Admin\Tables;

use Illuminate\View\Component;

class AdminLang extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $arTranslations;
    public $enTranslations;
    public function __construct($arTranslations, $enTranslations)
    {
        $this->arTranslations = $arTranslations;
        $this->enTranslations = $enTranslations;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.tables.admin-lang');
    }
}
