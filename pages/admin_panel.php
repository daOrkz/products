<?php

// require_once( realpath(__DIR__ . '/..') .  '/connect/getAllGoods.php' );  // -> $goods
// require_once( realpath(__DIR__ . '/..') .  '/services/search.php' );   // -> $filterGoods

session_start();

// $firstLoad = true;
$goods = require_once( 'admin_load.php' );


// echo count($filterGoods);
// print_r($filterGoods);

// if(!empty($filterGoods)) {
//   $goods = $filterGoods;
// }

if($_SESSION['user']['status'] != 'admin' && $_SESSION['user']['statusCode'] < 90){
  header('Location: /');
}

if(!empty($_SESSION['msg'])) {
  echo "
    <div class='container'>
      <div class='msg msg-success' role='alert'>
      {$_SESSION['msg']} 
      </div>
    </div>
  ";
}
$_SESSION['msg'] = '';
?>

<?php include_once('templates/header.php'); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
</head>
<body>

<div class="container">
  <div class="form__search__wrap">
    <form class="form-search" action=""> 
      <!-- ../services/search.php -->
      <input type="text" name="id" id="" placeholder="id">
      <input type="text" name="title" id="" placeholder="title">
      <input type="text" name="price" id="" placeholder="price">
      <input type="text" name="text" id="" placeholder="text">
      <button type="submit">Search</button>
    </form>
  </div>
  <table>
    <tr>
      <th>id</th>
      <th>Название</th>
      <th>Цена</th>
      <th>Описание</th>
      <th>Изображение</th>
      <th>&#9998;</th>
      <th>&#10006;</th>
    </tr>

    <?php foreach($goods as $good) { ?>
      <tr>
        <td><?= $good['id']    ?></td>
        <td><?= $good['title'] ?></td>
        <td><?= $good['price'] ?></td>
        <td><?= $good['text']  ?></td>
        <td><?= $good['img']   ?></td>
        <td><a href="../pages/updateGoods.php?id=<?= $good['id'] ?> ">Обновить</a></td>
        <td><a href="../services/deleteGoods.php?id=<?= $good['id'] ?>">Удалить</a></td> 
      </tr>
    <?php } ?>
  </table>

  <form action="../pages/addGood.php">
    <button type="submit">Добавить</button>
  </form>
</div>

<?php include_once('templates/footer.php'); ?>
