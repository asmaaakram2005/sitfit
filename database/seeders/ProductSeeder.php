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
                'slug' => 'sitfit-pro-cushion', 
            ],
            [
                'name' => 'SitFit Pro Cushion',
                'description' => 'Premium posture corrector cushion for long-term office work.',
                'price' => 2500,
                'material' => 'High-Grade Molded ABS / Polypropylene Plastic — Durable, flexible, and lightweight injection-molded structure engineered for long-term daily use.',
                'weight_capacity' => 'Up to 130 – 150 kg',
                'warranty' => '1-Year Full Warranty (Electronic & Mechanical Defects)',
                'compatibility' => 'Fits Most Chairs (Office, Car, Home)',
                'frame_material' => 'High-Grade Molded ABS / Polypropylene Plastic — Durable, flexible, and lightweight injection-molded structure engineered for long-term daily use.',
                'upholstery' => 'Premium Breathable Mesh',
                'recline_range' => 'Adaptive Dynamic Flex (90° – 135°) — Flexible contouring system with adjustable mounting straps, compatible with office, car, and home chairs.',
                'long_description' => 'The SitFit Pro Cushion is a premium ergonomic solution designed to enhance posture and comfort during extended sitting periods. Crafted with high-grade materials, it provides optimal support for the lower back and promotes spinal alignment. Ideal for office workers, gamers, and anyone who spends long hours seated, the SitFit Pro Cushion combines advanced design with user-friendly features to deliver a superior sitting experience.',
               
                'Smart_Features' => 'Posture Tracking Sensors & Mobile App Integration — Embedded posture-monitoring sensors with slouch detection alerts and real-time Bluetooth sync via the mobile application.',
                'AI_Posture_Tracking' => 'Monitors your seated position in real time to prevent slouching, back strain, and muscle fatigue.',
                'Silent_Vibration_Alerts' => 'Gently notifies you to correct your posture without interrupting your focus or workflow.',
                'Companion_App' => 'Tracks daily posture scores, provides sitting analytics, and sets personalized health goals effortlessly.',
                'Universal_Ergonomic_Fit_Features' => 'adaptive dynamic flex with adjustable straps designed to fit seamlessly on office, car, and home chairs.',
                'image_1' => 'images/products/sitfit-pro_1.jpeg',
                'image_2' => 'images/products/sitfit-pro_2.jpeg',
                'image_3' => 'images/products/sitfit-pro_3.jpeg',
                'feature_1' => 'Posture Correction',
                'feature_2' => 'Smart Sensors',
                'feature_3' => 'App Integration',
                'stock' => 50,
                'is_active' => true,
            ]
        );
    }
}