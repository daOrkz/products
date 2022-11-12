<?php

require_once('connect.php');
require_once('sqlQuery.php');
require_once( realpath(__DIR__ . '/..') .  '/services/outputGoods.php' ); // -> outputGoods(str queryStr)

$filterRow = DB::connect($queryStr['getAllGoods'])->rowCount();
if($filterRow > 3) {
 return $goods = outputGoods($queryStr['getAllGoods']);
}

$goods = DB::connect(sprintf($queryStr['getAllGoods']))->fetchAll();

return $goods;

