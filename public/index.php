<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// Defining Arrays
$categories = array();
$results = array();
$displayArray = array();
$lastMovies = array();
$displaylength=0;

// Define how many objects are to appear on the front page
    if(isset($_POST['selection'])) {
        $displaylength = $_POST['selection'];
    }

$sql = 'SELECT cat_id, cat_name FROM categories	ORDER BY RAND()	DESC LIMIT '.$displaylength;
$sth = $pdo->query($sql);

if ($sth === false) {
	print_r($sth->errorInfo());
}
else {
	$categories = $sth->fetchAll(PDO::FETCH_ASSOC);
	foreach ($categories as $key => $value) {
		$sql = 'SELECT COUNT(categories_cat_id)	AS results FROM movies WHERE categories_cat_id='.$value['cat_id'];
		$sth = $pdo->query($sql);
		if ($sth === false) {
			print_r($sth->errorInfo());
		}
		else {
			$results = $sth->fetchAll(PDO::FETCH_ASSOC);
			$temp =  implode(",", $results[0]);
			$displayArray[] = '<a href="http://google.com" class="btn btn-success">'.$temp.' '.$value['cat_name'].'</a>';
		}
}

$sql = 'SELECT * FROM movies ORDER BY mov_id DESC LIMIT 3';
$sth = $pdo->query($sql);
if ($sth === false) {
	print_r($sth->errorInfo());
}
else {
	$lastMovies = $sth->fetchAll(PDO::FETCH_ASSOC);
	$movie1 = $lastMovies[0];
	$movie2 = $lastMovies[1];
	$movie3 = $lastMovies[2];
}
}

// A la fin, toujours les vues
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/home.php';
include dirname(dirname(__FILE__)).'/view/footer.php';