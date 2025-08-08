<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('type');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('lead_time')->nullable();
            $table->string('age_group')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('min_capacity')->nullable();
            $table->string('max_capacity')->nullable();
            $table->string('playground_series')->nullable();
            $table->string('recycled_content')->nullable();
            $table->string('materials')->nullable();
            $table->text('description')->nullable();
            $table->text('description_html')->nullable();
            $table->string('quick_ship_item')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
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
