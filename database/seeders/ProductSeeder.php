<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::firstOrCreate(

            [
                'slug' => 'sitfit-smart-support',
            ],

            [
                'name' => 'SitFit Smart Support',

                'description' => 'A smart ergonomic support device designed to improve posture and provide maximum comfort during long sitting hours.',

                'price' => 1499.99,

                'stock' => 100,

                'is_active' => true,
            ]

        );
    }
}