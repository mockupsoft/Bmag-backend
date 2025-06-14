<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Haber başlığı
            $table->string('slug')->unique(); // SEO dostu URL
            $table->text('summary')->nullable(); // Kısa özet
            $table->longText('content'); // Tam içerik
            $table->text('image')->nullable(); // Kapak görseli
            $table->boolean('is_published')->default(false); // Yayın durumu
            $table->timestamp('published_at')->nullable(); // Yayın tarihi
            $table->unsignedBigInteger('category_id')->nullable(); // Kategori (eğer kategoriler varsa)
            $table->unsignedBigInteger('magazine_id')->nullable();
            $table->string('meta_title')->nullable(); // SEO başlığı
            $table->string('meta_description')->nullable(); // SEO açıklaması
            $table->string('meta_keywords')->nullable(); // SEO anahtar kelimeleri
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
