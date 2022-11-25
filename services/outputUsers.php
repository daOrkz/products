<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );


function outputGoods($query){
  require( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

  $countRow = DB::connect($query)->rowCount();

  if($countRow > 3) {
    $goods = DB::connect($query)->fetchAll();
    if (isset($_GET['page'])){
      $page = $_GET['page'];
    }else $page = 1;
    $goodsOnPage = 3;
    $offset = ($page - 1)  * $goodsOnPage;
    $totalPages = ceil(count($goods) / $goodsOnPage);
    $goods = DB::connect(sprintf($query . $queryStr['offsetUsers'], $goodsOnPage, $offset))->fetchAll();
    
    return [
      'users'     => $goods,
      'totalPages' => $totalPages,
    ];
  }
}
