<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('label')->nullable()->after('guard_name');
            $table->string('category')->nullable()->after('label');
            $table->text('description')->nullable()->after('category');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn(['label', 'category', 'description']);
        });
    }

};
