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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('position');
            $table->string('community');
            $table->string('track');
            $table->string('email')->unique();       // unique عشان الإيميل متكررش
            $table->char('first_letter', 1)->nullable(); // char(1) أنسب حاجة للحرف الواحد
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};