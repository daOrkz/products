<?php

$firstLoad = true;

function loadScrypt(){
  global $firstLoad;
  
  if($firstLoad){
    return require_once( realpath(__DIR__ . '/..') .  '/connect/getAllGoods.php' );
    return $goods;
  }
  $firstLoad = false;

  if(!$firstLoad){
    require_once( realpath(__DIR__ . '/..') .  '/services/search.php' );   // -> $filterGoods
    return $filterGoods;
  }
  
}

return loadScrypt();