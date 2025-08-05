<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeProgressTable extends Migration
{
    public function up()
    {
        Schema::create('episode_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('episode_id');
            $table->unsignedInteger('watched_seconds')->default(0);
            $table->timestamps();
            $table->unique(['user_id', 'episode_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('episode_progress');
    }
}
