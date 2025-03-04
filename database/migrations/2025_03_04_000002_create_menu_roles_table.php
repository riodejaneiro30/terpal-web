<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_roles', function (Blueprint $table) {
            $table->uuid('menu_role_id')->primary();
            $table->uuid('menu_id');
            $table->uuid('role_id');
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();

            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_roles');
    }
};
