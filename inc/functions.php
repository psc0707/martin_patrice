<?php
	// Defining Constants for omdb api queries
	define("omdbApi_title", "http://www.omdbapi.com/?t=");

	// Query to fetch 4 latest movies
	$newestAddition = 'SELECT *
	FROM movies
	LEFT OUTER JOIN categories ON categories.cat_id = movies.categories_cat_id
	LIMIT 4
	ORDER BY movies.mov_id DESC';
?>