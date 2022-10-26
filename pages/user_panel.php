<?php 

include_once('templates/header.php');
session_start();

if(!empty($_SESSION['user'])) {
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
}

echo 'user panel';
include_once('templates/footer.php');

