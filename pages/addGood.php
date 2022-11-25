<?php

include_once('templates/header.php');
require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );

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
    <form action="../services/addGood.php" method="POST">
        <input name="title" type="text" placeholder="Title">
        <input name="price" type="text" placeholder="Price">
        <textarea name="text" id="" cols="30" rows="10" placeholder="About"></textarea>
        <input name="image" type="text" placeholder="Image">
        <button type="submit">Add</button>
    </form>
  </div>
</div>


  
<?php
include_once('templates/footer.php');
?>