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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // Breakfast, Main Course, Snacks, Desserts
            $table->text('description');
            $table->integer('prep_time'); // in minutes
            $table->integer('cook_time'); // in minutes
            $table->integer('total_time'); // in minutes
            $table->integer('servings');
            $table->string('difficulty'); // Easy, Medium, Hard
            $table->integer('calories')->nullable();
            $table->json('ingredients'); // Array of ingredients with quantities
            $table->json('instructions'); // Array of step-by-step instructions
            $table->json('tips')->nullable(); // Array of pro cooking tips
            $table->string('emoji')->default('🍛');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
