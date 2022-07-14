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
        Schema::create('film_actor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_film')->unique();
            $table->bigInteger('id_actor')->unique();

            $table->timestamps();
        });       
        
        Schema::create('film_scenario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_film')->unique();
            $table->bigInteger('id_scenario')->unique();

            $table->timestamps();
        }); 
        
        Schema::create('film_director', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_film')->unique();
            $table->bigInteger('id_director')->unique();
        }); 
        
        Schema::create('film_genre', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_film')->unique();
            $table->bigInteger('id_genre')->unique();
        }); 

        Schema::create('film_countrie', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_film')->unique();
            $table->bigInteger('id_country')->unique();

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
        Schema::dropIfExists('film_actor');
        Schema::dropIfExists('film_scenario');
        Schema::dropIfExists('film_director');
        Schema::dropIfExists('film_genre');
        Schema::dropIfExists('film_countrie');
    }
};
