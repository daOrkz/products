<?php

session_start();

if(!empty($_SESSION['user'])) {
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
}
// $_SESSION['msg'] = '';

?>