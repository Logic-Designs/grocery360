<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=> 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('12345678'),
            'image' => 'images/main/admin.png',
            'role'=> 1,
        ]);
    }
}
