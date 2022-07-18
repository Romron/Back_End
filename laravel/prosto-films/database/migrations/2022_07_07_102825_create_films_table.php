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

        
        Schema::create('films', function (Blueprint $table) {
            $table->id('id_film');
            $table->string('Title_Film');
            $table->string('Duration');
            $table->string('CashFilm');
            $table->string('RatingIMDb');
            $table->string('WorldPremiere');
            $table->string('ProductionYear');

            $table->bigInteger('id_producer')->unsigned();
            $table->foreign('id_producer')
                ->references('id_producer')
                ->on('producers_list')
                ->onUpdate('cascade')
                ->onDelete('cascade');


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
        Schema::dropIfExists('films');
    }
};





// $table->bigInteger('id_actor')->unsigned();
// $table->bigInteger('id_producer')->unsigned();
// $table->bigInteger('id_scenario')->unsigned();
// $table->bigInteger('id_director')->unsigned();
// $table->bigInteger('id_genre')->unsigned();
// $table->bigInteger('id_country')->unsigned();

// $table->foreign('id_actor')->references('id_actor')->on('actors_list');
// $table->foreign('id_producer')->references('id_producer')->on('producers_list');
// $table->foreign('id_scenario')->references('id_scenario')->on('scenario_list');
// $table->foreign('id_director')->references('id_director')->on('director_list');
// $table->foreign('id_genre')->references('id_genre')->on('genre_list');
// $table->foreign('id_country')->references('id_country')->on('country_list');