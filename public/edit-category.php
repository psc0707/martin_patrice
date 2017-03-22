<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

$catName = '';

if (!empty($_POST)) {
	print_r($_POST);
	$catName = strip_tags(strtoupper(trim($_POST['newCategory'])));
	echo $catName;

$sql = '
	SELECT cat_name
	FROM categories
';

$results = $pdo->query($sql);
$resultList = $results->fetchAll(PDO::FETCH_ASSOC); // 
print_r($resultList);

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