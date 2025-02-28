<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('product_id')->primary();
            $table->string('product_name');
            $table->uuid('product_category_id');
            $table->decimal('width', 8, 2);
            $table->decimal('length', 8, 2);
            $table->string('product_color');
            $table->integer('stock_available');
            $table->decimal('price', 10, 2);
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();

            $table->foreign('product_category_id')->references('product_category_id')->on('product_categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
