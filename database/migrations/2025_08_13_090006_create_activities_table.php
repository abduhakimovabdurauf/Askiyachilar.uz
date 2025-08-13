<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->text('description_uz')->nullable()->change();
            $table->text('description_ru')->nullable()->change();
            $table->text('description_en')->nullable()->change();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
