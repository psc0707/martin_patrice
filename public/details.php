<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// Récupération de données ou autres

// page d'un film spécifique

if (!empty($_GET)) {
	// Debug
	print_r($_GET);
	$movId = $_GET['movId'];	
}

// echo $movId;

$movieDetails = array();

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
	$movieDetails = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
	// print_r($movieDetails);
}

// echo $movieDetails['0']['mov_support'];










// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/details.php';
include dirname(dirname(__FILE__)).'/view/footer.php';