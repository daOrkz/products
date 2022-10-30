<?php

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/getAllGoods.php' );


session_start();
include_once('templates/header.php');

if($_SESSION['user']['status'] == 'user' && $_SESSION['user']['statusCode'] < 90){
  // header('Location: /');
}

/* 
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
 */
?>

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
  <table>
    <tr>
      <th>id</th>
      <th>Название</th>
      <th>Цена</th>
      <th>Описание</th>
      <th>Изображение</th>
      <th>&#8921;</th>
    </tr>

    <?php foreach($goods as $good) { ?>
      <tr>
        <td><?= $good['id'] ?></td>
        <td><?= $good['title'] ?></td>
        <td><?= $good['price'] ?></td>
        <td><?= $good['text'] ?></td>
        <td><?= $good['img'] ?></td>
        <td><a href="../pages/aboutGoods.php?id=<?= $good['id'] ?>">Подробнее</a></td>
      </tr>
    <?php } ?>
  </table>
</div>
<?php
include_once('templates/footer.php');
?>
