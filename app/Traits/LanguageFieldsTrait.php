<?php

namespace App\Traits;

trait LanguageFieldsTrait
{
    protected function getLanguageFields($fieldPrefix)
    {
        $languageField = "{$fieldPrefix}_" . app()->getLocale();
        $defaultField = "{$fieldPrefix}_".config('app.locale');

        return  $this->$languageField ? : $this->$defaultField;
    }
}
