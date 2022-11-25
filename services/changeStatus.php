<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

session_start();

$id = $_GET['id'];
$status = $_GET['status'];

$opt = ['status' => $status, 'id' => $id];

try {
  $count = DB::connect($queryStr['changeStatus'], $opt)->rowCount();

} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  header('Location: ../pages/admin_panel.php');
}
if($count == 0) {   // если rowCount () равен нулю , то $stmt выполнил без ошибок , $stmt был выполнен, но ничего не изменил.
  $_SESSION['msg'] = 'Данные пользователя обновлены';
  header('Location: ../pages/admin_panel.php');
}