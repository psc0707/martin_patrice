<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

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

if (!(isset($_GET['paginationSelected']))) {
  $pagination = 3; // Valeur par défaut  
} else {
  $pagination = $_GET['paginationSelected'];
}
// La pagination a été demandée


// print_r('pagination '.$pagination);
// Je calcule l'offset à partir du numéro de page
$pageOffset = ($pageNo-1) * $pagination;

// Detail d'un film
$movieId = isset($_GET['movieId']) ? intval($_GET['movieId']) : 0;

// Je récupère le mot recherché
$searchWord = isset($_GET['s']) ? trim(strip_tags($_GET['s'])) : '';

// print_r('$searchWord '.$searchWord.'<br>');

$sql = 'SELECT `mov_id`, `mov_title`, `mov_released`, `mov_director`, `mov_runtime`, `mov_actors`, `mov_synopsis`, `mov_language`, `mov_poster`, `mov_rating`, 					`mov_support`, `mov_link`, mov_inserted, `Categories_cat_id`
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
// Le tri est demandé
if (isset($_GET['desc'])) {
  $sql .= 'ORDER BY mov_inserted DESC';
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
}


// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/catalog.php';
include dirname(dirname(__FILE__)).'/view/footer.php';