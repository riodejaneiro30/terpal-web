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
        Schema::create('product_images', function (Blueprint $table) {
            $table->uuid('product_image_id')->primary();
            $table->string('product_id');
            $table->longText('product_image')->nullable();
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
