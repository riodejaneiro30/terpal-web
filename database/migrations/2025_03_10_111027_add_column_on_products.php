<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('net_price', 8, 2)->nullable()->after('product_image');
            $table->integer('min_stock')->nullable()->after('net_price');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('net_price');
            $table->dropColumn('min_stock');
        });
    }
};
