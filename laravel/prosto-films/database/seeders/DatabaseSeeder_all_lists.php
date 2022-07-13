<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder_all_lists extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_date_from_json = get_arr_from_json_file("storage/Content/Resources/kinopoisk/json/result_DateAboutAllFilms .json") ;
        for ($i=1; $i < count($arr_date_from_json); $i++) { 

            if (is_string($arr_date_from_json[$i]['Actors'])) {
                DB::table('actors_list')->insert([
                    'name_actor' => $arr_date_from_json[$i]['Actors']
                ]);	
            }elseif(is_array($arr_date_from_json[$i]['Actors'])){
                for ($q=0; $q < count($arr_date_from_json[$i]['Actors']); $q++) { 
                    DB::table('actors_list')->insert([
                        'name_actor' => $arr_date_from_json[$i]['Actors'][$q]
                    ]);
                }
            }else {
                echo($i . '.   In actors_list something went wrong!');
            }

            if (is_string($arr_date_from_json[$i]['Producer'])) {
                DB::table('producers_list')->insert([
                    'name_producer' => $arr_date_from_json[$i]['Producer']
                ]);	
            }elseif(is_array($arr_date_from_json[$i]['Producer'])){
                for ($q=0; $q < count($arr_date_from_json[$i]['Producer']); $q++) { 
                    DB::table('producers_list')->insert([
                        'name_producer' => $arr_date_from_json[$i]['Producer'][$q]
                    ]);
                }
            }else {
                echo($i . '.   In producers_list Something went wrong!');
            }

            if (is_string($arr_date_from_json[$i]['Scenario'])) {
                DB::table('scenario_list')->insert([
                    'name_scenario' => $arr_date_from_json[$i]['Scenario']
                ]);	
            }elseif(is_array($arr_date_from_json[$i]['Scenario'])){
                for ($q=0; $q < count($arr_date_from_json[$i]['Scenario']); $q++) { 
                    DB::table('scenario_list')->insert([
                        'name_scenario' => $arr_date_from_json[$i]['Scenario'][$q]
                    ]);
                }
            }else {
                echo($i . '.   In scenario_list Something went wrong!');
            }

            if (is_string($arr_date_from_json[$i]['Director'])) {
                DB::table('director_list')->insert([
                    'name_director' => $arr_date_from_json[$i]['Director']
                ]);	
            }elseif(is_array($arr_date_from_json[$i]['Director'])){
                for ($q=0; $q < count($arr_date_from_json[$i]['Director']); $q++) { 
                    DB::table('director_list')->insert([
                        'name_director' => $arr_date_from_json[$i]['Director'][$q]
                    ]);
                }
            }else {
                echo($i . '.   In director_list Something went wrong!');
            }

            if (is_string($arr_date_from_json[$i]['Genre'])) {
                DB::table('genre_list')->insert([
                    'title_genre' => $arr_date_from_json[$i]['Genre']
                ]);	
            }elseif(is_array($arr_date_from_json[$i]['Genre'])){
                for ($q=0; $q < count($arr_date_from_json[$i]['Genre']); $q++) { 
                    DB::table('genre_list')->insert([
                        'title_genre' => $arr_date_from_json[$i]['Genre'][$q]
                    ]);
                }
            }else {
                echo($i . '.   In genre_list Something went wrong!');
            }

            if (is_string($arr_date_from_json[$i]['Country'])) {
                DB::table('country_list')->insert([
                    'title_country' => $arr_date_from_json[$i]['Country']
                ]);	
            }elseif(is_array($arr_date_from_json[$i]['Country'])){
                for ($q=0; $q < count($arr_date_from_json[$i]['Country']); $q++) { 
                    DB::table('country_list')->insert([
                        'title_country' => $arr_date_from_json[$i]['Country'][$q]
                    ]);
                }
            }else {
                echo($i . '.   In country_list Something went wrong!');
            }


        }





        
    }



}







function get_arr_from_json_file($file_name_json){
    /*
        получает файл импорта в формате json 
        возвращает массив подготовленный для добавления постов
    */
    $json_str = file_get_contents ($file_name_json);
    $arr_date_from_json = json_decode($json_str, true);
    return $arr_date_from_json;
}
