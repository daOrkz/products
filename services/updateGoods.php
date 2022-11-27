<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

session_start();

$id    = strip_tags($_REQUEST['id']);
$title = strip_tags($_REQUEST['title']);
$price = strip_tags($_REQUEST['price']);
$text  = strip_tags($_REQUEST['text']);



$uploaddir = (realpath(__DIR__ . '/..') .  '/res/img/');
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
  // echo "Файл корректен и был успешно загружен.\n";
} else {
  // echo "Возможная атака с помощью файловой загрузки!\n";
}
$image = basename($_FILES['image']['name']);

$opt = ['title' => $title, 'price' => $price, 'text' => $text, 'image' => $image];

try {
  $count = DB::connect(sprintf($queryStr['updateGood'], $id), $opt)->rowCount();
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  header('Location: ../pages/admin_panel.php');
}
if($count > 0) {  
  $_SESSION['msg'] = 'Данные успешно обновленны';
  header('Location: ../pages/admin_panel.php');
}
