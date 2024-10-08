<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Define the relationship with the Company model
    public function companies()
    {
        return $this->hasMany(Company::class, 'category_id');
    }
}
