<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'type',
        'image',
        'title',
        'description',
    ];

    /**
     * Get the company that owns the item.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
