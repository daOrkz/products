<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

if(empty($_REQUEST)) {
  // header('Location: ../pages/admin_panel.php');
  // header('Location: /home/fillipp/www/test/pages/admin_panel.php');
  // header("Location: http://testoland.flp/pages/admin_panel.php ");
  return $filterGoods = [];
  // exit;
} 
session_start();

$id    = trim($_REQUEST['id']);
$title = trim($_REQUEST['title']);
$price = trim($_REQUEST['price']);
$text  = trim($_REQUEST['text']);
// $image = strip_tags($_REQUEST['image']);
$searchText = '*' . $title . $text . '*';

try {
  if(!empty($_REQUEST['id'])) {
    $filterGoods = DB::connect(sprintf($queryStr['searchOnId'], $id))->fetch();
  }
  if(!empty($_REQUEST['price'])) {
    $filterGoods = DB::connect(sprintf($queryStr['searchOnPrice'], $price))->fetchall();
  }
  if(!empty($_REQUEST['title']) || !empty($_REQUEST['text'])) {
    $filterGoods = DB::connect(sprintf($queryStr['searchOnText'], $searchText))->fetchAll();
  }
  // return $filterGoods;
  header('Location: ../pages/admin_panel.php');
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  header('Location: ../pages/admin_panel.php');
}
if(count($filterGoods) == 0) {
  $_SESSION['msg'] = 'Ничего не найдено';
  header('Location: ../pages/admin_panel.php');
}