<?php

session_start();
include_once('templates/header.php');


if(!empty($_SESSION['user'])) {
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
}

echo 'admin panel';
include_once('templates/footer.php');

?>
