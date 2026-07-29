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
        // 1. حساب الـ Admin
        User::firstOrCreate(
            ['email' => 'admin@sitfit.com'],
            [    
                'name'     => 'Admin', 
                'phone'    => '+2010123456789',
                'image'    => 'images/adminPhoto/admin.png',
                'role'     => 'admin',
                'password' => '123456789',
            ]
        );

        // 2. حساب الـ User / Customer العادي
        User::firstOrCreate(
            ['email' => 'user@sitfit.com'], // إيميل  لليوزر
            [    
                'name'     => 'User', 
                'phone'    => '+2010987654321', // رقم تليفون لليوزر
                'image'    => 'images/adminPhoto/user.png',
                'role'     => 'customer', // الـ role الافتراضي customer
                'password' => '123456789',
            ]
        );
    }
}