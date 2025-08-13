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
        Schema::create('humorists', function (Blueprint $table) {
            $table->id();
            $table->text('name_uz');
            $table->text('name_ru');
            $table->text('name_en');
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('job_uz');
            $table->text('job_ru');
            $table->text('job_en');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humorists');
    }
};
