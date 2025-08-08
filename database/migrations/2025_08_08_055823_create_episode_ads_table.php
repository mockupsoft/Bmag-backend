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
        Schema::create('episode_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('episode_id');
            $table->integer('second');
            $table->string('title');
            $table->string('url');
            $table->text('image');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episode_ads');
    }
};
