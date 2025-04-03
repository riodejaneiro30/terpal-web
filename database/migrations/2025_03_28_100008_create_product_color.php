<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_colors', function (Blueprint $table) {
            $table->uuid('product_color_id')->primary();
            $table->string('product_color');
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_colors');
    }
};
