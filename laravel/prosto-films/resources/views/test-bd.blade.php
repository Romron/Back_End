<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>test-bd</title>
</head>
<body>
   
<?php 
   use Illuminate\Support\Facades\Storage;


   // $arr_date_from_json = get_arr_from_json_file("Content/Resources/kinopoisk/json/result_DateAboutAllFilms  TEST .json") ; 
   

	$arr_date_from_json = get_arr_from_json_file("result_DateAboutAllFilms  TEST .json") ;
	for ($count_producer = $i = 1; $i < count($arr_date_from_json); $i++) { 
			echo($i . '. $i   ');
			echo($count_producer);
		if (is_array($arr_date_from_json[$i]['Producer'])) {
			for ($q=0; $q < count($arr_date_from_json[$i]['Producer']); $q++) { 
					echo "array: <pre>";
						print_r($arr_date_from_json[$i]['Producer'][$q]);
					echo "</pre>"; 
			}
		}else{
			echo "string: <pre>";
				print_r($arr_date_from_json[$i]['Producer']);
			echo "</pre>"; 		
		}
		
		$count_producer = $count_producer + 2;
	
	}


				// 'id_scenario' => $arr_film[$i][''],
				// 'id_director' => $arr_film[$i][''],
				// 'id_genre' => $arr_film[$i][''],
				// 'id_country' => $arr_film[$i][''],



	function get_arr_from_json_file($file_name_json){
		/*
			получает файл импорта в формате json 
			возвращает массив подготовленный для добавления постов
		*/
		$json_str = file_get_contents ($file_name_json);
		$arr_date_from_json = json_decode($json_str, true);
		return $arr_date_from_json;
	}






?>








</body>
</html>