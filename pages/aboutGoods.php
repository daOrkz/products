<?php

session_start();

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );
include_once('templates/header.php');

$id = $_GET['id'];

$good = DB::connect(sprintf($queryStr['aboutGood'], $id))->fetch();

$title = $good['title'];
$price = $good['price'];
$text = $good['text'];
$image = $good['img'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<div class="container">
  <div class="form__update__wrap">
    <p> <?= $title ?> </p>
    <img src="" alt="img_good" width="200px">
    <p>Цена: <?= $price ?> </p>
    <p>Описание: <?= $text ?> </p>
    <a href="user_panel.php">Назад</a>
  </div>
</div>
  
<?php
include_once('templates/footer.php');
?>