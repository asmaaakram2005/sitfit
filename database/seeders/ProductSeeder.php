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

                'price' => 800,

                'material' => 'High-Grade ABS Plastic & Ergonomic Mesh',
                'weight_capacity' => 'Up to 130 – 150 kg',

                'warranty' => '1-Year Full Warranty (Electronic & Mechanical Defects)',

                'compatibility' => 'Fits Most Chairs (Office, Car, Home)',
                'frame_material' => 'High-Grade Molded ABS / Polypropylene Plastic — Durable, flexible, and lightweight injection-molded structure engineered for long-term daily use.',
                'upholstery' => 'Breathable Ergonomic Mesh & High-Density Memory Foam — Sweat-resistant, high-airflow mesh combined with smart memory foam padding for optimal spinal alignment and comfort.',
                'recline_range' => 'Adaptive Dynamic Flex (90° – 135°) — Flexible contouring system with adjustable mounting straps, compatible with office, car, and home chairs.',
                
                'long_description' => 'SitFit is an innovative HealthTech solution designed to transform any standard chair into an ergonomic, posture-correcting seat. By pairing smart hardware with real-time data analytics, SitFit attaches seamlessly to office chairs, home furniture, or car seats to alleviate back pain, improve sitting posture, and enhance daily productivity. It bridges the gap between high-end ergonomic furniture and affordability—giving users personalized health insights and actionable posture correction in a portable, easy-to-use device.',
                
                'image_1' => 'images/products/sitfit-smart-support_1.jpeg',

                'image_2' => 'images/products/sitfit-smart-support_2.jpeg',

                'image_3' => 'images/products/sitfit-smart-support_3.jpeg',

                

                'stock' => 100,

                'is_active' => true,
            ]

        );

        Product::firstOrCreate(
            [
                'slug' => 'sitfit-pro-cushion', 
            ],
            [
                'name' => 'SitFit Pro Cushion',
                'description' => 'Premium posture corrector cushion for long-term office work.',
                'price' => 1200,
                'material' => 'High-Grade Molded ABS / Polypropylene Plastic — Durable, flexible, and lightweight injection-molded structure engineered for long-term daily use.',
                'weight_capacity' => 'Up to 130 – 150 kg',
                'warranty' => '1-Year Full Warranty (Electronic & Mechanical Defects)',
                'compatibility' => 'Fits Most Chairs (Office, Car, Home)',
                'frame_material' => 'High-Grade Molded ABS / Polypropylene Plastic — Durable, flexible, and lightweight injection-molded structure engineered for long-term daily use.',
                'upholstery' => 'Premium Breathable Mesh',
                'recline_range' => 'Adaptive Dynamic Flex (90° – 135°) — Flexible contouring system with adjustable mounting straps, compatible with office, car, and home chairs.',
                'long_description' => 'The SitFit Pro Cushion is a premium ergonomic solution designed to enhance posture and comfort during extended sitting periods. Crafted with high-grade materials, it provides optimal support for the lower back and promotes spinal alignment. Ideal for office workers, gamers, and anyone who spends long hours seated, the SitFit Pro Cushion combines advanced design with user-friendly features to deliver a superior sitting experience.',
               
                'Smart Features' => 'Posture Tracking Sensors & Mobile App Integration — Embedded posture-monitoring sensors with slouch detection alerts and real-time Bluetooth sync via the mobile application.',
                'AI Posture Tracking' => 'Monitors your seated position in real time to prevent slouching, back strain, and muscle fatigue.',
                'Silent Vibration Alerts' => 'Gently notifies you to correct your posture without interrupting your focus or workflow.',
                'Companion App' => 'Tracks daily posture scores, provides sitting analytics, and sets personalized health goals effortlessly.',
                'Universal Ergonomic Fit Features' => 'adaptive dynamic flex with adjustable straps designed to fit seamlessly on office, car, and home chairs.',
                'image_1' => 'images/products/sitfit-pro_1.jpeg',
                'image_2' => 'images/products/sitfit-pro_2.jpeg',
                'image_3' => 'images/products/sitfit-pro_3.jpeg',
                'stock' => 50,
                'is_active' => true,
            ]
        );
    }
}