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
        Schema::create('shade_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('glide_elbow')->nullable();
            $table->string('fabric_types')->nullable();
            $table->string('min_shade_size')->nullable();
            $table->string('max_shade_size')->nullable();
            $table->string('shade_frame_warranty')->nullable();
            $table->string('shade_fabric_warranty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shade_properties');
    }
};
