<?php

// Constante pour définir la configuration de la DB
define('DB_HOST', 'wf3.progweb.fr');
define('DB_USER', 'patrices');
define('DB_PASSWORD', 'webforce3');
define('DB_DATABASE', 'patrices_sql0');

// définition DSN
$dsn = 'mysql:dbname='.DB_DATABASE.';host='.DB_HOST.';charset=UTF8';
// Instanciation de PDO
try {
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
}
catch (Exception $e) {
	echo $e->getMessage();
}

require dirname(dirname(__FILE__)).'/inc/functions.php';