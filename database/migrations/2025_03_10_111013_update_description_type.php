<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('general_parameters', function (Blueprint $table) {
            $table->longText('general_parameter_value')->change();
        });
    }

    public function down(): void
    {
        Schema::table('general_parameters', function (Blueprint $table) {
            $table->string('general_parameter_value')->change();
        });
    }
};
