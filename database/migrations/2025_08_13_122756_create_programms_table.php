<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programms', function (Blueprint $table) {
            $table->id();
            $table->text('title_uz');
            $table->text('title_ru');
            $table->text('title_en');
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('from');
            $table->text('to');
            $table->text('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programms');
    }
};
