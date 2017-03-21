<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// Récupération de données ou autres

$lastMovies = array();
$sql = '
	SELECT *
	FROM movies
	ORDER BY mov_id DESC
	LIMIT 3
';
$sth = $pdo->query($sql);
if ($sth === false) {
	print_r($sth->errorInfo());
}
else {
	$lastMovies = $sth->fetchAll(PDO::FETCH_ASSOC);
}

// print_r($lastMovies);

$movie1 = $lastMovies[0];

// print_r($movie1);

$movie2 = $lastMovies[1];

// print_r($movie2);

$movie3 = $lastMovies[2];

// print_r($movie3);






















// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/home.php';
include dirname(dirname(__FILE__)).'/view/footer.php';