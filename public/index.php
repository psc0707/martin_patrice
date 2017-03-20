<?php
// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

 // Récupération de données ou autres


// A la fin, toujours les vues

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/home.php';
include dirname(dirname(__FILE__)).'/view/footer.php';