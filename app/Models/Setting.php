<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_keywords',
        'meta_title',
        'meta_description',
        'google_analytic',
        'logo',
    ];
}
