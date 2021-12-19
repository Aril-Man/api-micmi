<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Episode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_episode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('show_id');
            $table->string('title_episode');
            $table->string('link');
            $table->timestamps();

            $table->foreign('show_id')->references('id')->on('tbl_show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_episode');
    }
}
