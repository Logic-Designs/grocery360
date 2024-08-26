<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'image',
    ];

    // Define the relationship with the CompanyCategory model
    public function category()
    {
        return $this->belongsTo(CompanyCategory::class, 'category_id');
    }

    public function items()
    {
        return $this->hasMany(CompanyItem::class);
    }

    /**
     * Get the latest items for the company.
     */
    public function latestItems()
    {
        return $this->items()->where('type', 'latest');
    }

    /**
     * Get the new launches for the company.
     */
    public function newLaunches()
    {
        return $this->items()->where('type', 'new_launch');
    }

    /**
     * Get the products for the company.
     */
    public function products()
    {
        return $this->items()->where('type', 'product');
    }
}
