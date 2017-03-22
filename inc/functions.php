<?php

function movieDetail($movId) {	
	global $pdo;
	$movieDetails = array(
	  'cat_name'    => '',
	  'mov_id'	    => '',
	  'mov_title'   => '',
	  'mov_released'=> '',
	  'mov_runtime'=> '',
	  'mov_actors'  => '',
	  'mov_synopsis' => '',
	  'mov_language' => '',
	  'mov_poster'  => '',
	  'mov_link'    => '',
	  'mov_support' => ''	  
	);
	$sql = '
		SELECT *
		FROM movies
		LEFT OUTER JOIN categories ON categories.cat_id = categories_cat_id
		WHERE mov_id = :movId
	';

	$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':movId',$movId);


	if ($pdoStatement->execute() === false) {
		print_r($pdoStatement->errorInfo());
	}
	else {	
		$movieDetails = $pdoStatement->fetch(PDO::FETCH_ASSOC);		
		// print_r($movieDetails);
		return($movieDetails);

	}
	return $movieDetails;
}

function getLangue($language) {
	switch ($language) {
		case 0:
			return 'English';
		case 1:
			return 'French';
		case 2:
			return 'German';
		case 3:
			return 'Italian';
		case 4:		
		default:
			return 'NC';
	}
}

function filterStringInputPost($name, $defaultValue='') {
	$getValue = filter_input(INPUT_POST, $name);
	if ($getValue !== false) {
		return trim(strip_tags($getValue));
	}
	return $defaultValue;
}
function filterIntInputPost($name, $defaultValue=0) {
	$getValue = filter_input(INPUT_POST, $name);
	if ($getValue !== false) {
		return intval(trim($getValue));
	}
	return $defaultValue;
}