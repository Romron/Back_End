<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class DatabaseSeeder_films extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
    public function run()
    {
        // начинаю считать с одного что бы совпадало со счётчиком фильмов 
        $count_actor 
        = $count_producer = 1;

        $arr_date_from_json = get_arr_from_json_file("storage/Content/Resources/kinopoisk/json/result_DateAboutAllFilms .json") ;
        for ($count_film = 1; $count_film < count($arr_date_from_json); $count_film++) { 

            if($count_film > 10){
                break;
            }

            echo "\n count_film   =    ", $count_film;
            echo "\n count_producer =  ", $count_producer;
            echo "\n count_actor   =   ", $count_actor;
            echo "\n";

            if (is_string($arr_date_from_json[$count_film]['Producer'])) {
                try{
                    DB::table('producers_list')->insert([
                        'name_producer' => $arr_date_from_json[$count_film]['Producer']
                    ]);	                 
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
                    $count_producer++;
                    } catch(QueryException $e){
                        echo 'Поймано исключение: ',  $e->getMessage(), "\n";
                        echo 'код исключения: ',  $e->getCode(), "\n";
                        continue;
                        }  
            }elseif(is_array($arr_date_from_json[$count_film]['Producer'])){
                for ($n_Producers=0; $n_Producers < count($arr_date_from_json[$count_film]['Producer']); $n_Producers++) { 
                    try{ 
                        DB::table('producers_list')->insert([
                            'name_producer' => $arr_date_from_json[$count_film]['Producer'][$n_Producers]
                        ]);
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
                        $count_producer++;
                    } catch(QueryException $e){
                        echo 'Поймано исключение: ',  $e->getMessage(), "\n";
                        echo 'код исключения: ',  $e->getCode(), "\n";
                        continue;
                    }                  
                }
            }else {
                echo($count_film . '.   In producers_list Something went wrong!');
            }
            
            if (is_string($arr_date_from_json[$count_film]['Actors'])) {
                // try{
                //     DB::table('producers_list')->insert([
                //         'name_producer' => $arr_date_from_json[$count_film]['Producer']
                //     ]);	                 
                //     DB::table('films')->insert([
                //         'id_film' => $arr_date_from_json[$count_film]['Id_kinopisk'],
                //         'Title_Film' => $arr_date_from_json[$count_film]['Title'],
                //         'Duration' => $arr_date_from_json[$count_film]['Duration'],
                //         'CashFilm' => $arr_date_from_json[$count_film]['CashFilm'],
                //         'RatingIMDb' =>$arr_date_from_json[$count_film]['RatingIMDb'],
                //         'WorldPremiere' => $arr_date_from_json[$count_film]['WorldPremiere'],
                //         'ProductionYear' => $arr_date_from_json[$count_film]['ProductionYear'],
                //         'id_producer' => $count_producer
                //     ]);           
                //     $count_producer++;
                //     } catch(QueryException $e){
                //         echo 'Поймано исключение: ',  $e->getMessage(), "\n";
                //         echo 'код исключения: ',  $e->getCode(), "\n";
                //         continue;
                //         }  
            }elseif(is_array($arr_date_from_json[$count_film]['Actors'])){
                for ($n_Actors=0; $n_Actors < count($arr_date_from_json[$count_film]['Actors']); $n_Actors++) { 
                    try{     
                        DB::table('actors_list')->insert([  
                            'name_actor' => $arr_date_from_json[$count_film]['Actors'][$n_Actors],

                            нужно собрать SQL запрос который
                                проверит есть ли в таблице добавляемое значение
                                если да вернёт его id 
                                иначе добавит запись


                            if(!EXISTS (SELECT column_name FROM table_name WHERE condition) )   
                                
                                

                            incert if()
                            incert EXISTS (
                                    SELECT column_name FROM table_name WHERE condition);


                        ]);
                        DB::table('film_actor')->insert([ 
                            'id_film' => $count_film,
                            'id_actor' => $count_actor
                        ]);
                        $count_actor++;
                    } catch(QueryException $e){
                        echo 'Поймано исключение: ',  $e->getMessage(), "\n";
                        echo 'код исключения: ',  $e->getCode(), "\n";
                        continue;
                    }                  

                }



            }else {
                echo($count_film . '.   In actors_list Something went wrong!');
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