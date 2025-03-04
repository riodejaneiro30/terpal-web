<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('menu_id')->primary();
            $table->string('menu_name');
            $table->string('menu_description');
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
