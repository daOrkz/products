<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );
require_once( realpath(__DIR__ . '/..') .  '/services/outputGoods.php' ); // -> outputGoods(str queryStr)

// session_start();

if(array_key_exists('id', $_GET)) {
  $_SESSION['search'] = '';

  $id    = trim($_REQUEST['id']);
  $title = trim($_REQUEST['title']);
  $price = trim($_REQUEST['price']);
  $text  = trim($_REQUEST['text']);
  // $image = strip_tags($_REQUEST['image']);
  $searchText = '*' . $title . $text . '*';

  $_SESSION['search'] = [
    'id'         => $id,
    'title'      => $title,
    'price'      => $price,
    'text'       => $text,
    'searchText' => $searchText,
  ];
}

if(empty($_SESSION['search']) || ( !array_key_exists('id', $_GET) && empty($_GET) )){
  $_SESSION['search'] = '';

  return require( realpath(__DIR__ . '/..') .  '/connect/getAllGoods.php' );
}


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
  if(!empty($_SESSION['search']['price'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnPrice'], $_SESSION['search']['price']);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
      return $filterGoods = outputGoods($sqlQuerryStr);
    }

    return $filterGoods = DB::connect($sqlQuerryStr)->fetchAll();

    // $filterGoods = DB::connect(sprintf($queryStr['searchOnPrice'], $price))->fetchall();
  }
  if(!empty($_SESSION['search']['title']) || !empty($_SESSION['search']['text'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnText'], $_SESSION['search']['searchText']);
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