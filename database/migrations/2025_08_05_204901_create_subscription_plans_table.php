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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Gold, Platinum, Standart
            $table->enum('interval', ['monthly', 'yearly']);
            $table->boolean('is_discounted')->default(false); // fiziki dergi indirimi
            $table->decimal('price'); // TL cinsinden
            $table->string('description')->nullable(); // "Aylık 69 TL’ye denk gelir" vs.
            $table->string('apple_product_id')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
