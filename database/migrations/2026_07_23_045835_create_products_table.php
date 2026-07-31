<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('slug')->unique();

            $table->text('description');

            $table->text('image_1');

            $table->text('image_2');

            $table->text('image_3');

            $table->decimal('price', 10, 2);

            $table->integer('stock');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->text('material');

            $table->text('weight_capacity');

            $table->text('warranty');

            $table->text('compatibility');

            $table->text('frame_material');

            $table->text('upholstery');

            $table->text('recline_range');

            $table->text('long_description');

            $table->text('Smart_Features')->nullable();

            $table->text('AI_Posture_Tracking')->nullable();

            $table->text('Silent_Vibration_Alerts')->nullable();

            $table->text('Companion_App')->nullable();

            $table->text('Universal_Ergonomic_Fit_Features')->nullable();

            $table->text('feature_1')->nullable();

            $table->text('feature_2')->nullable();

            $table->text('feature_3')->nullable();



        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
