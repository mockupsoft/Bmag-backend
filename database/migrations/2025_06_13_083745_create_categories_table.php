<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Görünen kategori adı
            $table->string('slug')->unique(); // SEO uyumlu URL
            $table->text('description')->nullable(); // Sayfa içeriği
            $table->string('image')->nullable(); // Kategori görseli
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable(); // Opsiyonel, modern SEO’da etkisiz
            $table->string('canonical_url')->nullable();
            $table->string('seo_image')->nullable(); // Sosyal medya için görsel
            $table->string('robots')->default('index, follow'); // Arama motoru direktifleri
            $table->boolean("is_active")->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
