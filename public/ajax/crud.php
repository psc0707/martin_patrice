<?php
// Inclusion de config.php
require dirname(dirname(dirname(__FILE__))).'/inc/config.php';

header("Content-type:application/json");

// print_r($_POST);
// print_r($_POST["cat_name"]);
// Je structure mon tableau à encoder en JSON
$returnedJsonArray = array(
  'code' => 0,
  'errorList' => array(
    'CRUD error'
  ),
  'data' => array()
);

if (!empty($_POST)) {  
  // $catName = strip_tags(strtoupper(trim($_POST["cat_name"])));

  // print_r($_POST["cat_name"]);
  $cat_name     = filterStringInputPost("cat_name"); 
  $mov_title    = filterStringInputPost("mov_title"); 
  $mov_released = filterStringInputPost("mov_released"); 
  $mov_language = filterStringInputPost("mov_language"); 
  $mov_actors   = filterStringInputPost("mov_actors"); 
  $mov_synopsis = filterStringInputPost("mov_synopsis"); 
  $mov_poster   = filterStringInputPost("mov_poster"); 

} else {
  // J'affiche le json et j'arrete le script
  die(json_encode($returnedJsonArray));
}

// La catégorie existe o/n?
$genre = readGenre($cat_name);

// print_r($genre);
// print_r($genre['cat_id']);

if (sizeof($genre) == 0)   {
  // print_r($genre);
    $genreToInsert = addGenre($cat_name);
} else {
    $genreToInsert = $genre['cat_id'];
}
  // print_r($genreToInsert);

$sql = 'INSERT INTO `movies`
      (`mov_title`,
       `mov_released`, 
       `mov_actors`,
       `mov_synopsis`, 
       `mov_language`, 
       `mov_poster`,
       `mov_support`,
       `categories_cat_id`)
      VALUES (            
            :mov_title,
            :mov_released,
            :mov_actors,
            :mov_synopsis,
            :mov_language,            
            :mov_poster,
            :mov_support,
            :cat_id
      )
  ';       

$sth = $pdo->prepare($sql);
$sth->bindValue(':mov_title',$mov_title);
$sth->bindValue(':mov_released',$mov_released);
$sth->bindValue(':mov_language',$mov_language);
$sth->bindValue(':mov_actors',$mov_actors);
$sth->bindValue(':mov_synopsis',$mov_synopsis);
$sth->bindValue(':mov_poster',$mov_poster);
$sth->bindValue(':mov_support',"NAS");
$sth->bindValue(':cat_id',$genreToInsert);

// print_r($sth->debugDumpParams());

if ($sth->execute() === false) {
  print_r($sth->errorInfo());
}
else {
  // print_r('Inserted : ');
  $movieInserted = $pdo->lastInsertId(); 
 
// Je structure mon tableau à encoder en JSON
  $returnedJsonArray = array(
  'code' => 1,
  'errorList' => array(),
  'data' => $movieInserted
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


function readGenre($catName) {
  global $pdo;
  $genre = array();

  $sql = 'SELECT cat_id, cat_name
          FROM categories
        WHERE UCASE(cat_name) = :catName
    ';       
  // print_r($sql);

  $sth = $pdo->prepare($sql);
  $sth->bindValue(':catName',$catName);

  if ($sth->execute() === false) {

    print_r($sth->errorInfo());
  }
  else {    
    if ($sth->rowCount() != 0) {
      $genre = $sth->fetch(PDO::FETCH_ASSOC);    
    }
    // print_r($catName);
    // print_r($genre);
    return($genre);
  }

}

function addGenre($catName) {
  global $pdo;
  $sql = 'INSERT INTO `categories`
        (`cat_name`
        )
        VALUES (            
              :cat_name
                      )
    ';       

  $sth = $pdo->prepare($sql);
  $sth->bindValue(':cat_name',$catName);

  // print_r($sth->debugDumpParams());

  if ($sth->execute() === false) {
    print_r($sth->errorInfo());
  }
  else {
    // print_r('Inserted : ');
    $genreInserted = $pdo->lastInsertId(); 
    return  $genreInserted;
  }

}

function updateMovie($catName) {
  global $pdo;

}


