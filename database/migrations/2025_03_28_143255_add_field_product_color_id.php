<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_color');
            $table->uuid('color_id')->nullable();
            $table->foreign('color_id')
                  ->references('product_color_id')
                  ->on('product_colors')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('color_id');
            $table->string('product_color');
        });
    }
};
