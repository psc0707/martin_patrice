<?php
	// Defining Constants for omdb api queries
	define("omdbApi_title", "http://www.omdbapi.com/?t=");

	// Query to fetch 4 latest movies
	$newestAddition = 'SELECT *
	FROM movies
	LEFT OUTER JOIN categories ON categories.cat_id = movies.categories_cat_id
	LIMIT 4
	ORDER BY movies.mov_id DESC';



function movieDetail($movId) {	
	global $pdo;
	$movieDetails = array(
	  'cat_name'    => '',
	  'mov_title'   => '',
	  'mov_actors'  => '',
	  'mov_poster'  => '',
	  'mov_link'    => '',
	  'mov_support' => '',
	  'mov_language' => '',
	  'mov_synopsis' => '',
	  'mov_released' => '' 
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