<?php  

require dirname(dirname(__FILE__)).'/inc/config.php';

header("Content-type:application/json");


// $sql = '
// 	SELECT *
// 	FROM student
// ';
// $pdoStatement = $pdo->query($sql);

// // Si erreur
// if ($pdoStatement === false) {
// 	print_r($pdo->errorInfo());
// }
// else { print_r($pdoStatement);	
// }	














// Mettre les vues 

include dirname(dirname(__FILE__)).'/view/header.php';
// include dirname(dirname(__FILE__)).'/view/xxxxxx.php';
include dirname(dirname(__FILE__)).'/view/footer.php';