<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('role_id')->primary();
            $table->string('role_name');
            $table->string('role_description');
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
