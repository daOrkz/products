<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

session_start();

$id = strip_tags($_GET['id']);

// $count = DB::connect(sprintf($queryStr['deleteGood'], $id))->rowCount();


try {
  $count = DB::connect(sprintf($queryStr['deleteGood'], $id))->rowCount();
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  header('Location: ../pages/admin_panel.php');
}
if($count > 0) {
  $_SESSION['msg'] = 'Товар успешно удален';
  header('Location: ../pages/admin_panel.php');
}



if($count > 0) {
  $_SESSION['msg'] = 'Товар успешно удален';
  header('Location: ../pages/admin_panel.php');
} else {
  $_SESSION['msg'] = 'Товар не удалось обновить';
  header('Location: ../pages/admin_panel.php');
}

