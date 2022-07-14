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
        if (!Schema::hasTable('actors_list')) {
            Schema::create('actors_list', function (Blueprint $table) {
                $table->id('id_actor');
                $table->string('name_actor');
            });       
        }

        if (!Schema::hasTable('producers_list')) {
            Schema::create('producers_list', function (Blueprint $table) {
                $table->id('id_producer');
                $table->string('name_producer');
            });
        }

        if (!Schema::hasTable('scenario_list')) {
            Schema::create('scenario_list', function (Blueprint $table) {
                $table->id('id_scenario');
                $table->string('name_scenario');
            });
        }

        if (!Schema::hasTable('director_list')) {
            Schema::create('director_list', function (Blueprint $table) {
                $table->id('id_director');
                $table->string('name_director');
            });
        }
        if (!Schema::hasTable('genre_list')) {
            Schema::create('genre_list', function (Blueprint $table) {
                $table->id('id_genre');
                $table->string('title_genre');
            });
        }
        if (!Schema::hasTable('country_list')) {
            Schema::create('country_list', function (Blueprint $table) {
                $table->id('id_country');
                $table->string('title_country');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors_list');
        Schema::dropIfExists('producers_list');
        Schema::dropIfExists('scenario_list');
        Schema::dropIfExists('director_list');
        Schema::dropIfExists('genre_list');
        Schema::dropIfExists('country_list');

    }
};
