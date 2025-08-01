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
        Schema::create('serie_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('serie_id');
            $table->unsignedBigInteger('serie_season_id');
            $table->text('name');
            $table->text('slug');
            $table->text('description');
            $table->bigInteger('views')->default(0);
            $table->text('video_path');
            $table->tinyInteger('locked')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie_sections');
    }
};
