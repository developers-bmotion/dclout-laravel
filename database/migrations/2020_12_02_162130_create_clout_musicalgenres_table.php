<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloutMusicalgenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clout_musicalgenres', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('musical_genres_id');
            $table->foreign('musical_genres_id')->references('id')->on('musical_genres');
            $table->unsignedInteger('clout_id');
            $table->foreign('clout_id')->references('id')->on('clouts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clout_musicalgenres');
    }
}
