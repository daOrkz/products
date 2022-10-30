<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

session_start();

$title = strip_tags($_POST['title']);
$price = strip_tags($_POST['price']);
$text  = strip_tags($_POST['text']);
$image = strip_tags($_POST['image']);

$opt = ['title' => $title, 'price' => $price, 'text' => $text, 'image' => $image];

try {
  $count = DB::connect($queryStr['addGood'], $opt)->rowCount();
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  header('Location: ../pages/admin_panel.php');
}
if($count > 0) {
  $_SESSION['msg'] = 'Товар успешно добален';
  header('Location: ../pages/admin_panel.php');
}
//  else {
//   $_SESSION['msg'] = 'Товар не удалось добавить';
//}
