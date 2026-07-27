<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@sitfit.com'],
            [   
            'name' => 'Admin', 
            'phone' => '+2010123456789',
            'image' => 'images/adminPhoto/admin.png',
            'role' => 'admin',
            'password' => '123456789',
            ]
        );
    }
}
