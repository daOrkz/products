<?php

session_start();

if(!empty($_SESSION['user'])) {
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
}
<<<<<<< HEAD
=======
// $_SESSION['msg'] = '';
//1
>>>>>>> 4b6449a5369fc526aa916e5825f28b8eb5e3dfd2

?>
