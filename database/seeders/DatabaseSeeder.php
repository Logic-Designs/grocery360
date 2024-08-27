<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(AdminSeeder::class);
        $this->call([
            CompanyCategorySeeder::class,
            CompanySeeder::class,
            CompanyItemSeeder::class,
            ArticleSeeder::class,
            OfferSeeder::class,
            SupermarketSeeder::class, // Add the SupermarketSeeder here
        ]);
    }
}
