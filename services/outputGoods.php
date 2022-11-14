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
    $tottalPages = ceil(count($goods) / $goodsOnPage);
    $goods = DB::connect(sprintf($query . $queryStr['getAllGoodsOffset'], $goodsOnPage, $offset))->fetchAll();

    renderPagination($tottalPages);

    return $goods;
  }

}

function renderPagination($tottalPages){
/* 
  $get = '';
  foreach($_GET as $key=>$value){
    $get.="$key=$value&";
  }
   */
  for ($i = 1; $i <= $tottalPages; $i++){
    echo "<a href=/pages/admin_panel.php?page={$i}> Страница {$i} </a>";
  }
}
