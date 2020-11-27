<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name');
            $table->json('description');
            $table->string('link');
            $table->enum('state', [
                \App\Project::REVISION,
                \App\Project::PUBLICADO,
                \App\Project::ACEPTADO,
                \App\Project::RECHAZADO,

            ])->default(\App\Project::REVISION);
            $table->timestamp('end_time');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('project_category_id');
            $table->foreign('project_category_id')->references('id')->on('project_categories');
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
        Schema::dropIfExists('projects');
    }
}
