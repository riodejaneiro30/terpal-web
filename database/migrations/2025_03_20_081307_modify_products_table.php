<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('width', 8, 2)->nullable()->change();
            $table->decimal('length', 8, 2)->nullable()->change();
            $table->decimal('height', 8, 2)->nullable();
            $table->string('type')->default('Non-Custom')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('width', 8, 2)->nullable(false)->change();
            $table->decimal('length', 8, 2)->nullable(false)->change();
            $table->dropColumn('height');
            $table->dropColumn('type');
        });
    }
};
