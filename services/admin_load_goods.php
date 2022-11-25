<?php

// function loadScrypt(){
   
/*   if(!empty($_REQUEST['page']) ||  empty($_REQUEST)){
    return require( realpath(__DIR__ . '/..') .  '/connect/getAllGoods.php' );
  } */

  if(isset($_REQUEST['search']) && !empty($_REQUEST)){
    return require( realpath(__DIR__ . '/..') .  '/services/search.php' );   // -> $filterGoods
  }
  
// }

// return loadScrypt();