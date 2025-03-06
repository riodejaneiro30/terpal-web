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
            $table->string('menu_id');
            $table->string('role_id');
            $table->primary(['menu_id', 'role_id']);
            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_roles');
    }
};
