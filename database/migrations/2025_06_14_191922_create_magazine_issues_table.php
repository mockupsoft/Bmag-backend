<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagazineIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('magazine_issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('magazine_id');
            $table->string('title');
            $table->string('slug')->unique(); // SEO dostu URL
            $table->integer('issue_number');
            $table->date('issue_date')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('pdf_path')->nullable();
            $table->string('barcode')->unique();
            $table->double('price')->default(0);
            $table->double('vat_price')->default(0);
            $table->integer('stock')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('magazine_issues');
    }
}
