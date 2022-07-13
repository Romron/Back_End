<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder_films extends Seeder
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
            DB::table('films')->insert([
                'id_film' => $arr_date_from_json[$i]['Id_kinopisk'],
                'Title_Film' => $arr_date_from_json[$i]['Title'],
                'Duration' => $arr_date_from_json[$i]['Duration'],
                'CashFilm' => $arr_date_from_json[$i]['CashFilm'],
                'RatingIMDb' =>$arr_date_from_json[$i]['RatingIMDb'],
                'WorldPremiere' => $arr_date_from_json[$i]['WorldPremiere'],
                'ProductionYear' => $arr_date_from_json[$i]['ProductionYear'],
          ]);
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