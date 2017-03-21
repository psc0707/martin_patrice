<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';


if (!empty($_POST)) {

	print_r($_POST);
	// echo '<br>';

	// Je récupère les données et les traite
	$catName = strip_tags(strtoupper(trim($_POST['categorie'])));

$sql = '
	INSERT INTO categories(cat_name) 
	VALUES (:categorie)
';
// J'exécute la requête
$pdoStatement = $pdo->prepare($sql_insert_student);
$pdoStatement->bindValue(':categorie', $catName, PDO::PARAM_STR);











// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/add-category.php';
include dirname(dirname(__FILE__)).'/view/footer.php';