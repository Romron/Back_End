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

        // $count_producer = 0;

        $arr_date_from_json = get_arr_from_json_file("storage/Content/Resources/kinopoisk/json/result_DateAboutAllFilms .json") ;
        for ($count_producer = $count_film = 1; $count_film < count($arr_date_from_json); $count_film++) { 
            // DB::table('films')->insert([
            //     'id_film' => $arr_date_from_json[$count_film]['Id_kinopisk'],
            //     'Title_Film' => $arr_date_from_json[$count_film]['Title'],
            //     'Duration' => $arr_date_from_json[$count_film]['Duration'],
            //     'CashFilm' => $arr_date_from_json[$count_film]['CashFilm'],
            //     'RatingIMDb' =>$arr_date_from_json[$count_film]['RatingIMDb'],
            //     'WorldPremiere' => $arr_date_from_json[$count_film]['WorldPremiere'],
            //     'ProductionYear' => $arr_date_from_json[$count_film]['ProductionYear'],
            // ]);
        
            // echo '$count_producer = ' . $count_producer;
            
        if (is_string($arr_date_from_json[$count_film]['Producer'])) {
           
            DB::table('films')->insert([
                'id_film' => $arr_date_from_json[$count_film]['Id_kinopisk'],
                'Title_Film' => $arr_date_from_json[$count_film]['Title'],
                'Duration' => $arr_date_from_json[$count_film]['Duration'],
                'CashFilm' => $arr_date_from_json[$count_film]['CashFilm'],
                'RatingIMDb' =>$arr_date_from_json[$count_film]['RatingIMDb'],
                'WorldPremiere' => $arr_date_from_json[$count_film]['WorldPremiere'],
                'ProductionYear' => $arr_date_from_json[$count_film]['ProductionYear'],
                'id_producer' => $count_producer
            ]);           
           
            DB::table('producers_list')->insert([
                'name_producer' => $arr_date_from_json[$count_film]['Producer']
            ]);	 

            $count_producer++;
        }elseif(is_array($arr_date_from_json[$count_film]['Producer'])){
            for ($q=0; $q < count($arr_date_from_json[$count_film]['Producer']); $q++) { 
                DB::table('films')->insert([
                    'id_film' => $arr_date_from_json[$count_film]['Id_kinopisk'],
                    'Title_Film' => $arr_date_from_json[$count_film]['Title'],
                    'Duration' => $arr_date_from_json[$count_film]['Duration'],
                    'CashFilm' => $arr_date_from_json[$count_film]['CashFilm'],
                    'RatingIMDb' =>$arr_date_from_json[$count_film]['RatingIMDb'],
                    'WorldPremiere' => $arr_date_from_json[$count_film]['WorldPremiere'],
                    'ProductionYear' => $arr_date_from_json[$count_film]['ProductionYear'],
                    'id_producer' => $count_producer
                ]);           
               
                DB::table('producers_list')->insert([
                    'name_producer' => $arr_date_from_json[$count_film]['Producer'][$q]
                ]);

                $count_producer++;
            }
        }else {
            echo($count_film . '.   In producers_list Something went wrong!');
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