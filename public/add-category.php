<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

$newCatName = '';

$modCatName = '';

$sql = '
		SELECT cat_name, cat_id
		FROM categories
	';

	$results = $pdo->query($sql);
	$resultList = $results->fetchAll(PDO::FETCH_ASSOC); // 
	print_r($resultList);



if (!empty($_POST)) {
	print_r($_POST);
	$newCatName = strip_tags(trim($_POST['newCategory']));
	echo $newCatName;

	if ($catOriginalName >=1) {
		$sql = '
		INSERT INTO categories (cat_name)
		VALUES (:catName)
	';
	$sth = $pdo->prepare($sql);
	$sth->bindValue(':catName', $catOriginalName);
	if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		}
	else {
		// Je récupère l'ID auto-incrémenté
		return $pdo->lastInsertId();
		}
	}
}

if (!empty($_GET)) {
	print_r($_GET);
	$modCatId = strip_tags(trim($_GET['modifyCategory']));
	echo $modCatId;

$sql = '
		SELECT cat_name
		FROM categories
		WHERE cat_id = :id
	';
	$sth = $pdo->prepare($sql);
	$sth->bindValue(':id', $modCatId);

	if ($sth->execute() === false) {
		print_r($sth->errorInfo());
	}
	else {	
		$movieDetails = $sth->fetchAll(PDO::FETCH_ASSOC);
		print_r($movieDetails);
	}
}




// echo $resultList['0']['cat_name'];

// $pdoStatement = $pdo->prepare($sql);
// $pdoStatement->bindValue(':catName',$catName);

// if ($pdoStatement->execute() === false) {
// 	print_r($pdo->errorInfo());
// }
// else {	
// 	$movieCategory = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
// }

// if (empty($movieCategory)) {
// 		$verifOK[] = 'La catégorie a bien été ajoutée';
// 	}
// 	else {
// 		$verifNOOK[] = 'La catégorie a bien été ajoutée';
// 	}






// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/add-category.php';
include dirname(dirname(__FILE__)).'/view/footer.php';