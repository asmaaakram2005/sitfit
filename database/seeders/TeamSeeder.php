<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teamMembers = [
            [
                'name'      => 'Ahmed Mahmoud Mohamed',
                'position'  => 'member',
                'community' => 'WEB Development',
                'track'     => 'Back-End',
                'email'     => 'ahmedgf363@gmail.com',
            ],
            [
                'name'      => 'Sondos Hitham Mostafa ',
                'position'  => 'member',
                'community' => 'WEB Development',
                'track'     => 'Front-End',
                'email'     => 'sondoshitham66@gmail.com',
            ],
            [
                'name'      => 'Karim muhammed abdellatif',
                'position'  => 'member',
                'community' => 'WEB Development',
                'track'     => 'Front-End',
                'email'     => 'karimmuhammed1221@gmail.com',
            ],
            
        ];

        foreach ($teamMembers as $member) {
            // إضافة الحرف الأول داخل المصفوفة مباشرة لضمان إرساله مع الـ create والـ update
            $member['first_letter'] = mb_substr(trim($member['name']), 0, 1, 'UTF-8');

            Team::updateOrCreate(
                ['email' => $member['email']],
                $member
            );
        }
    }
}