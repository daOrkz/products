<?php

session_start();
include_once('templates/header.php');
$outputDB = require( realpath(__DIR__ . '/..') .  '/services/search.php' );
print_r($outputDB);
$good = $outputDB[0];


$goodForUpdate;
$id = $_GET['id'];

// foreach($goods as $idx => $good){
//   if($good['id'] == $id) {
//     $goodForUpdate = $good;
//   }
// }

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
    <form action="../services/updateGoods.php?id=<?= $id ?>" method="POST">
        <input name="title" type="text" placeholder="Title" value=" <?= $title ?> ">
        <input name="price" type="text" placeholder="Price" value=" <?= $price ?> ">
        <textarea name="text" id="" cols="30" rows="10" placeholder="About"> <?= $text ?> </textarea>
        <input name="image" type="text" placeholder="Image" value=" <?= $image ?> ">
        <button type="submit">Update</button>
    </form>
  </div>
</div>


  
<?php
include_once('templates/footer.php');
?>