<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

session_start();
$filterGoods = [];

if(empty($_GET)) {
  // header('Location: ../pages/admin_panel.php');
  // header('Location: /home/fillipp/www/test/pages/admin_panel.php');
  // header("Location: http://testoland.flp/pages/admin_panel.php ");
  // exit;
}

$id    = strip_tags($_REQUEST['id']);
$title = strip_tags($_REQUEST['title']);
$price = strip_tags($_REQUEST['price']);
$text  = strip_tags($_REQUEST['text']);
// $image = strip_tags($_REQUEST['image']);
$searchText = '*' . $title . $text . '*';

try {
  $filterGoods = DB::connect(sprintf($queryStr['search'], $searchText))->fetchAll();
  header('Location: ../pages/admin_panel.php');
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  header('Location: ../pages/admin_panel.php');
}
if(count($filterGoods) == 0) {
  $_SESSION['msg'] = 'Ничего не найдено';
  header('Location: ../pages/admin_panel.php');
}