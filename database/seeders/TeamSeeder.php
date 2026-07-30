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
                'linkedin'  => 'https://www.linkedin.com/in/ahmed-mahmoud-36a346386?utm_source=share_via&utm_content=profile&utm_medium=member_android',
                'github'    => 'https://github.com/ahmedgf363',
            ],
            [
                'name'      => 'Sondos Hitham Mostafa ',
                'position'  => 'member',
                'community' => 'WEB Development',
                'track'     => 'Front-End',
                'email'     => 'sondoshitham66@gmail.com',
                'linkedin'  => 'https://www.linkedin.com/in/sondos-hitham-089b21399?utm_source=share_via&utm_content=profile&utm_medium=member_android',
                'github'    => 'https://github.com/sondos05',
            ],
            [
                'name'      => 'Karim muhammed abdellatif',
                'position'  => 'member',
                'community' => 'WEB Development',
                'track'     => 'Front-End',
                'email'     => 'karimmuhammed1221@gmail.com',
            ],
            [
                'name'      => 'Yasmina Mohamed Abdelrauf',
                'position'  => 'member',
                'community' => 'WEB Development',
                'track'     => 'Front-End',
                'email'     => 'yasooymohamed3217@gmail.com',
                'linkedin'  => 'https://www.linkedin.com/in/yasmina-mohamed-7b1a42368?utm_source=share_via&utm_content=profile&utm_medium=member_android',
                'github'    => 'https://github.com/Yasminamohamed-45',
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