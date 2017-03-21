<?php
// Including config.php
require dirname(dirname(dirname(__FILE__))).'/inc/config.php';
header("Content-type:application/json");

// Collecting all Movies
$startPage = array();

// Recuperating URI from page
if (isset($_GET['page'])) {
	$pageNo = $_GET['page'];
}
else {
	// If none found return to Page 1
	$pageNo = 1;
}
// Calculating Offset from Page 1
$pageOffset = ($pageNo-1) * 5;

$pagination = 3;
if (!empty($_GET['page']) && ctype_digit($_GET['page'])) {
	$pageSkip = $_GET['page'] - 1; 
} else
{
	$pageSkip = 0;
}

$sql = 'SELECT `mov_poster`, `mov_rating`
				FROM movies
				WHERE 1=1
        LIMIT 4
		';			 

$sth = $pdo->prepare($sql);

if ($sth->execute() === false) {
	print_r($sth->errorInfo());
}
else {
	$startPage = $sth->fetchAll(PDO::FETCH_ASSOC);
	$nbResults = $sth->rowCount();

// Encoding table in JSON
  	$returnedJsonArray = array(
    'code' => 1,
    'errorList' => array(),
    'data' => $startPage
  );
  // Sending JSON Request and killing the Script
  die(json_encode($returnedJsonArray, JSON_PRETTY_PRINT));
}

// Encoding table in JSON
$returnedJsonArray = array(
  'code' => 0,
  'errorList' => array(
    'Execution error'
  ),
  'data' => array()
);

// Sending JSON Request and killing the Script
die(json_encode($returnedJsonArray));