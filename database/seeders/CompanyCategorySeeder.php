<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyCategory;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Technology',
            'Healthcare',
            'Finance',
            'Retail',
            'Education',
            'Real Estate',
            'Automotive',
            'Food & Beverage',
            'Entertainment',
            'Travel & Tourism'
        ];

        foreach ($categories as $category) {
            CompanyCategory::create([
                'name' => $category
            ]);
        }
    }
}
