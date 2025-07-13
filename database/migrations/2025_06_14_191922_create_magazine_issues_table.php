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
            $table->string('issue_month')->nullable();
            $table->text('description');
            $table->integer('issue_code');
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
