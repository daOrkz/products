<?php

function renderPagination($totalPages, $fileName){

  for ($i = 1; $i <= $totalPages; $i++){
    echo "<a href=/pages/{$fileName}.php?page={$i}> Страница {$i} </a>";
  }
}
