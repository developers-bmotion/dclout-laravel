<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clouts', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedInteger('level_id');
                $table->foreign('level_id')->references('id')->on('levels');
                $table->unsignedInteger('musical_genres_id');
                $table->foreign('musical_genres_id')->references('id')->on('musical_genres');
                $table->unsignedInteger('clout_category_id');
                $table->foreign('clout_category_id')->references('id')->on('cloud_categories');
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
        Schema::dropIfExists('clouts');
    }
}
