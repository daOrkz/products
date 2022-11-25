<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );
require_once( realpath(__DIR__ . '/..') .  '/services/outputUsers.php' ); // -> outputGoods(str queryStr)

// session_start();
if(array_key_exists('id', $_GET)){
  $id = trim($_REQUEST['id']);
  $login = trim($_REQUEST['login']);
}

if(array_key_exists('login', $_GET)) {
  $_SESSION['search'] = '';

  $login = trim($_REQUEST['login']);

  $_SESSION['search'] = [
    'id'    => $id,
    'login' => $login,
  ];
}

if(empty($_SESSION['search']) || ( !array_key_exists('id', $_GET) && empty($_GET) )){
  $_SESSION['search'] = '';

  return require( realpath(__DIR__ . '/..') .  '/connect/getAllUser.php' );
}


try {
  if(!empty($_REQUEST['id'])) {
    $sqlQuerryStr = sprintf($queryStr['searchUserOnId'], $id);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
     return $filterUser = outputGoods($sqlQuerryStr);
    }

    // $filterUser = DB::connect(sprintf($queryStr['searchOnId'], $id))->fetchAll();
    return $filterUser = DB::connect($sqlQuerryStr)->fetchAll();
  }
  if(!empty($_REQUEST['login'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnLogin'], $_REQUEST['login']);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
      return $filterUser = outputGoods($sqlQuerryStr);
    }

    return $filterUser = DB::connect($sqlQuerryStr)->fetchAll();

    // $filterUser = DB::connect(sprintf($queryStr['searchOnPrice'], $price))->fetchall();
  }
  if(!empty($_REQUEST['status'])) {
    $sqlQuerryStr = sprintf($queryStr['searchOnstatus'], $_REQUEST['status']);
    $filterRow = DB::connect($sqlQuerryStr)->rowCount();
    if($filterRow > 3) {
      return $filterUser = outputGoods($sqlQuerryStr);
    }

    return $filterUser = DB::connect($sqlQuerryStr)->fetchAll();

    // $filterUser = DB::connect(sprintf($queryStr['searchOnPrice'], $price))->fetchall();
  }
  return $filterUser;
} catch (PDOException $e) {
  $_SESSION['msg'] = $e;
  return;
}
if(count($filterUser) == 0) {
  $_SESSION['msg'] = 'Ничего не найдено';
  // header('Location: ../pages/admin_panel.php');
  return;
}