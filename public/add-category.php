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
	// print_r($_POST);
	$newCatName = strip_tags(trim($_POST['newCategory']));
	// echo $newCatName;

	$sql = '
		INSERT INTO categories (cat_name)
		VALUES (:catName)
	';
	$sth = $pdo->prepare($sql);
	$sth->bindValue(':catName', $modCatName);
	if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		}
	else {
		// Je récupère l'ID auto-incrémenté
		return $pdo->lastInsertId();
	}	
}

if (!empty($_GET)) {
	print_r($_GET);
	$modCatName = strip_tags(trim($_GET['modifyCategory']));
	echo $modCatName;

	$sql = '
		UPDATE categories
		SET cat_name = :catName
		WHERE cat_id = :catId
	';
	$sth = $pdo->prepare($sql);
	$sth->bindValue(':id', $id);
	$sth->bindValue(':lastname', $lastname);

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