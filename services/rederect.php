<?php

if($_GET['select'] == 'goods'){
  header('Location: ../pages/admin_panel.php');
}
if($_GET['select'] == 'user'){
  header('Location: ../pages/searchUser.php');
}