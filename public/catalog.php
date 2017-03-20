<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

 // Récupération de données ou autres
// Cas d'une recherche

<?php

// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// ICI MON CODE POUR CETTE PAGE
$currentPage = 'Tous les étudiants';

// Je récupère le paramètre d'URL/URI "page"
if (isset($_GET['page'])) {
	$pageNo = $_GET['page'];
}
else {
	// Sinon, page n°1 par défaut
	$pageNo = 1;
}
// Je calcule l'offset à partir du numéro de page
$pageOffset = ($pageNo-1) * 5;
/*
1 => 0
2 => 5
3 => 10
4 => 15
*/

// Je récupère l'ID de la session si fourni
$sessionId = isset($_GET['sesId']) ? intval($_GET['sesId']) : 0;

// Je récupère le mot recherché
$searchWord = isset($_GET['s']) ? trim(strip_tags($_GET['s'])) : '';

$sql = '
	SELECT stu_id, stu_lastname, stu_firstname, stu_email, stu_birthdate
	FROM student
	LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id
	WHERE 1=1
';
// Si l'ID session est fourni => filtrer sur cet ID
if ($sessionId > 0) {
	$sql .= '
		AND session_ses_id = :sessionId';
}
// Si recherche
if ($searchWord != '') {
	$sql .= '
		AND (
			stu_email LIKE :search
			OR stu_lastname LIKE :search
			OR stu_firstname LIKE :search
			OR cit_name LIKE :search
		)
	';
}
else {
	$sql .= '
		LIMIT 5 OFFSET '.$pageOffset;
}
//print_r($sql);exit;
$sth = $pdo->prepare($sql);
if ($sessionId > 0) {
	$sth->bindValue(':sessionId', $sessionId);
}
if ($searchWord != '') {
	$sth->bindValue(':search', '%'.$searchWord.'%');
}

if ($sth->execute() === false) {
	print_r($sth->errorInfo());
}
else {
	$studentList = $sth->fetchAll(PDO::FETCH_ASSOC);
	$nbResults = $sth->rowCount();
}

// FIN DE MON CODE POUR CETTE PAGE


// Cas générale sans recherche particulier
// Je récupère toutes les sessions
$moviesList = array();
$sql = '
	SELECT ses_id, ses_number, ses_start_date, ses_end_date, loc_name, tra_name
	FROM session
	INNER JOIN location ON location.loc_id = session.location_loc_id
	INNER JOIN training ON training.tra_id = session.training_tra_id
';
$sth = $pdo->query($sql);
if ($sth === false) {
	print_r($sth->errorInfo());
}
else {
	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		$title = $row['tra_name'].' à '.$row['loc_name'];
		$sessionsList[$title][] = $row;
	}
}

// Stats nb students par ville
$sql = '
	SELECT count(*) as nb, cit_name
	FROM city
	INNER JOIN student ON student.city_cit_id = city.cit_id
	GROUP BY cit_name
	ORDER BY nb DESC, cit_name ASC
';
$sth = $pdo->query($sql);
if ($sth === false) {
	print_r($pdo->errorInfo());
}
else {
	$studentsVilleList = $sth->fetchAll(PDO::FETCH_ASSOC);
}

// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/catalog.php';
include dirname(dirname(__FILE__)).'/view/footer.php';