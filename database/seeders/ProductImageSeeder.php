<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_1 = Product::where('slug','sitfit-smart-support')->first();

        $product_1->images()->create([
            'image' => 'products/sitfit-smart-support/smart-chair-front.png',
        ]);

        $product_1->images()->create([
            'image' => 'products/sitfit-smart-support/smart-chair-side.png',
        ]);

        $product_1->images()->create([
            'image' => 'products/sitfit-smart-support/smart-chair-sensor.png',
        ]);
    }
}
