<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('general_parameters', function (Blueprint $table) {
            $table->uuid('general_parameter_id')->primary();
            $table->string('general_parameter_key');
            $table->string('general_parameter_description')->nullable();
            $table->string('general_parameter_value');
            $table->string('created_by');
            $table->timestamp('created_date')->useCurrent();
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_updated_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('general_parameters');
    }
};
