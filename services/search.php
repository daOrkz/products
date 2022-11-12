<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );
require_once( realpath(__DIR__ . '/..') .  '/services/outputGoods.php' ); // -> outputGoods(str queryStr)

// session_start();

$id    = trim($_REQUEST['id']);
$title = trim($_REQUEST['title']);
$price = trim($_REQUEST['price']);
$text  = trim($_REQUEST['text']);
// $image = strip_tags($_REQUEST['image']);
$searchText = '*' . $title . $text . '*';

try {
  if(!empty($_REQUEST['id'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnId'], $id);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
     return $filterGoods = outputGoods($sqlQuerryStr);
    }

    // $filterGoods = DB::connect(sprintf($queryStr['searchOnId'], $id))->fetchAll();
    return $filterGoods = DB::connect($sqlQuerryStr)->fetchAll();
  }
  if(!empty($_REQUEST['price'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnPrice'], $price);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
      return $filterGoods = outputGoods($sqlQuerryStr);
    }

    return $filterGoods = DB::connect($sqlQuerryStr)->fetchAll();

    // $filterGoods = DB::connect(sprintf($queryStr['searchOnPrice'], $price))->fetchall();
  }
  if(!empty($_REQUEST['title']) || !empty($_REQUEST['text'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnText'], $searchText);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
      return $filterGoods = outputGoods($sqlQuerryStr);
    }

    return $filterGoods = DB::connect($sqlQuerryStr)->fetchAll();

    // $filterGoods = DB::connect(sprintf($queryStr['searchOnText'], $searchText))->fetchAll();
  }
  return $filterGoods;
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  return;
}
if(count($filterGoods) == 0) {
  $_SESSION['msg'] = 'Ничего не найдено';
  // header('Location: ../pages/admin_panel.php');
  return;
}