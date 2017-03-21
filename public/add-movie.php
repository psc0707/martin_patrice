<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// Récupération de données ou autres
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
// print_r($_GET);
if (!empty($_GET)) {
  // Debug  
  $movId = $_GET['movId'];  
  $movieDetails = movieDetail($movId);
  // print_r($movieDetails);
}


// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/add-movie.php';
include dirname(dirname(__FILE__)).'/view/footer.php';