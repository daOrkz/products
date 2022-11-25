<?php

require_once('connect.php');
require_once('sqlQuery.php');
require_once( realpath(__DIR__ . '/..') .  '/services/outputUsers.php' ); // -> outputGoods(str queryStr)


$filterRow = DB::connect($queryStr['getAllUsers'])->rowCount();

if($filterRow > 3) {
 return $users = outputGoods($queryStr['getAllUsers']);
}

$users = DB::connect(sprintf($queryStr['getAllUsers']))->fetchAll();

return $users;
