<?php
require '../../inc/config.php';

// Escape user inputs for security
$term = $_REQUEST['term'];

if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT cat_name FROM categories WHERE cat_name LIKE '" . $term . "%'";
    $sth = $pdo->query($sql);

    if ($sth === false) {
      print_r($sth->errorInfo());
    } else {
      $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
      if (isset($categories)){
        foreach ($categories as $key => $value) {
            echo "<p>" . $value['cat_name'] . "</p>";
      }
    } 
    else {
      echo "<p>No matches found</p>";
    } 
  }
}else {
    echo "ERROR: Could not able to execute $sql." . mysql_error($dsn);
  }
?>