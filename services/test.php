<?php


connect("SET @status_id = (select id from status where name = 'admin');
         UPDATE users SET status_id = @status_id WHERE id = ?", [11]);

function connect($sql, $args = []){
  $pdo = new PDO('mysql:host=TomatoLand;dbname=products;charset=utf8', 'root', '' );
  if (empty($args)){
    echo 'empty';
  }

  $stmt = $pdo->prepare($sql);
  $stmt->execute($args);
}


// $user = $res->fetch(PDO::FETCH_ASSOC);

// print_r($user);