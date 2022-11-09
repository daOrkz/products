<?php

require_once('connect.php');
require_once('sqlQuery.php');

$goods = DB::connect(sprintf($queryStr['getAllGoods']))->fetchAll();

return $goods;