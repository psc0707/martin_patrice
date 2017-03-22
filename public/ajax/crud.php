<?php
// Inclusion de config.php
require dirname(dirname(dirname(__FILE__))).'/inc/config.php';

header("Content-type:application/json");

print_r($_POST);
print_r($_POST['cat_name']);

if (!empty($_POST)) {
  // print_r($_POST);
  $catName = strip_tags(strtoupper(trim($_POST['cat_name'])));
  die($catName);
}

$catName = filterStringInputPost($catName);
$catName = strtoupper($catName);

$sql = 'SELECT cat_id, cat_name
        FROM categories
				WHERE UCASE(cat_name) = : catName
		';			 

// print_r($sql);

$sth = $pdo->prepare($sql);
$sth->bindValue(':cat_name',$catName);

if ($sth->execute() === false) {
	print_r($sth->errorInfo());
}
else {
	$genre = $sth->fetchAll(PDO::FETCH_ASSOC);
	$nbGenre = $sth->rowCount();

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
    'CRUD error'
  ),
  'data' => array()
);
// J'affiche le json et j'arrete le script
die(json_encode($returnedJsonArray));
// FIN DE MON CODE POUR CETTE PAGE



