<?php

session_start();

require( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

$id = trim($_GET['id']);

$sqlQuerryStr = sprintf($queryStr['searchOnId'], $id);
$good = DB::connect($sqlQuerryStr)->fetch();


$title = $good['title'];
$price = $good['price'];
$text = $good['text'];
$image = $good['img'];

?>

<?php
include_once('templates/header.php');
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
    <form enctype="multipart/form-data" action="../services/updateGoods.php?id=<?= $id ?>" method="POST">
        <input name="title" type="text" placeholder="Title" value=" <?= $title ?> ">
        <input name="price" type="text" placeholder="Price" value=" <?= $price ?> ">
        <textarea name="text" id="" cols="30" rows="10" placeholder="About"> <?= $text ?> </textarea>
        <input name="img" type="text" placeholder="Image" value=" <?= $image ?> ">
        <input name="image" type="file" />
        <button type="submit">Update</button>
    </form>
  </div>
</div>


  
<?php
include_once('templates/footer.php');
?>