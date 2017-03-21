<?php
// Inclusion de config.php
require dirname(dirname(dirname(__FILE__))).'/inc/config.php';

header("Content-type:application/json");
 // Récupération de données ou autres
// Cas d'une recherche


// Cas générale sans recherche particulier
// Je récupère tous les films
$moviesList = array();

// Je récupère le paramètre d'URL/URI "page"
if (isset($_GET['page'])) {
	$pageNo = $_GET['page'];
}
else {
	// Sinon, page n°1 par défaut
	$pageNo = 1;
}
// Je calcule l'offset à partir du numéro de page
$pageOffset = ($pageNo-1) * 5;

$pagination = 3;
if (!empty($_GET['page']) && ctype_digit($_GET['page'])) {
	$pageSkip = $_GET['page'] - 1; 
} else
{
	$pageSkip = 0;
}

$sql = 'SELECT `mov_id`, `mov_title`, `mov_released`, `mov_director`, `mov_runtime`, `mov_actors`, `mov_synopsis`, `mov_language`, `mov_poster`, `mov_rating`, 					`mov_support`, `mov_link`, `Categories_cat_id`
				FROM movies
				WHERE 1=1 
		';			 

$sth = $pdo->prepare($sql);

if ($sth->execute() === false) {
	print_r($sth->errorInfo());
}
else {
	$moviesList = $sth->fetchAll(PDO::FETCH_ASSOC);
	$nbResults = $sth->rowCount();

// Je structure mon tableau à encoder en JSON
  	$returnedJsonArray = array(
    'code' => 1,
    'errorList' => array(),
    'data' => $moviesList
  );
  // J'affiche le json et j'arrete le script
  die(json_encode($returnedJsonArray, JSON_PRETTY_PRINT));
}

// Je structure mon tableau à encoder en JSON
$returnedJsonArray = array(
  'code' => 0,
  'errorList' => array(
    'Execution error'
  ),
  'data' => array()
);
// J'affiche le json et j'arrete le script
die(json_encode($returnedJsonArray));
// FIN DE MON CODE POUR CETTE PAGE



