<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
        //всегда делать нуллебл если добавляем в текущую таблицу https://youtu.be/oCwP0PsHmUk?t=763
            $table->string('preview_image')->nullable();
            $table->string('main_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('preview_image');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('main_image');
        });
    }
};
