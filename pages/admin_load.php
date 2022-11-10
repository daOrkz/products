<?php

function loadScrypt(){
   
  if(empty($_REQUEST)){
    return require_once( realpath(__DIR__ . '/..') .  '/connect/getAllGoods.php' );
  }

  if(!empty($_REQUEST)){
    return require_once( realpath(__DIR__ . '/..') .  '/services/search.php' );   // -> $filterGoods
  }
  
}

return loadScrypt();