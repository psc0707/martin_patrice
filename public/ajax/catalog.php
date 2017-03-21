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

$pagination = 3; // Valeur par défaut
$defaut = $pagination;

// La pagination a été demandée
$pagination = isset($_GET['pagination']) ? intval($_GET['pagination']) : $defaut;

// print_r('pagination '.$pagination);
// Je calcule l'offset à partir du numéro de page
$pageOffset = ($pageNo-1) * $pagination;

// Detail d'un film
$movieId = isset($_GET['movieId']) ? intval($_GET['movieId']) : 0;

// Je récupère le mot recherché
$searchWord = isset($_GET['s']) ? trim(strip_tags($_GET['s'])) : '';


$sql = 'SELECT `mov_id`, `mov_title`, `mov_released`, `mov_director`, `mov_runtime`, `mov_actors`, `mov_synopsis`, `mov_language`, `mov_poster`, `mov_rating`, 					`mov_support`, `mov_link`, `Categories_cat_id`
				FROM movies
        LEFT OUTER JOIN categories on categories.cat_id = categories_cat_id
				WHERE 1=1 
		';			 

//Si l'ID session est fourni => filtrer sur cet ID
if ($movieId > 0) {
  $sql .= '
    AND mov_id = :movieId';
}
// Si recherche
if ($searchWord != '') {
  $sql .= '
    AND (
      mov_title LIKE :search
      OR categories.cat_name LIKE :search
      OR mov_synopsis LIKE :search
      OR mov_support LIKE :search
    )
  ';
}

$sql .= '
    LIMIT ' . $pagination . ' OFFSET '.$pageOffset;

// print_r($sql);

$sth = $pdo->prepare($sql);

if ($movieId > 0) {
  $sth->bindValue(':movieId', $movieId);
}
if ($searchWord != '') {
  $sth->bindValue(':search', '%'.$searchWord.'%');
}

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



