<?php

session_start();

require( realpath(__DIR__ . '/..') .  '/services/pagin.php' );
$outputDB = require( realpath(__DIR__ . '/..') .  '/services/searchUser.php' );

$fileName =  basename(__FILE__, '.php');
$users = $outputDB;
if(array_key_exists('users', $outputDB)){
  $users = $outputDB['users'];
  $tottalPages = $outputDB['totalPages'];
}

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

<?php 
  include_once('templates/header.php');
  include_once('templates/select.php');
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
  <div class="form__search__wrap">
    <form class="form-search" action=""> 
      <input type="text" name="id" id="" placeholder="id">
      <input type="text" name="login" id="" placeholder="login">
      <button type="submit">Search</button>
    </form>
  </div>
  <table>
    <tr>
      <th>id</th>
      <th>Логин</th>
      <th>Статус</th>
      <th>Статус код</th>
      <th>&#9998;</th>
      <th>&#10006;</th>
    </tr>

    <?php foreach($users as $user) { ?>
      <tr>
        <td><?= $user['id']    ?></td>
        <td><?= $user['login'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['status_code']  ?></td>
        <td><a href="../pages/updateGoods.php?id=<?= $good['id'] ?> ">Обновить</a></td>
        <td><a href="../services/deleteGoods.php?id=<?= $good['id'] ?>">Удалить</a></td> 
      </tr>
    <?php } 
    if(array_key_exists('users', $outputDB)){
      renderPagination($tottalPages, $fileName);
    }
    ?>
  </table>

  <form action="../pages/addGood.php">
    <button type="submit">Добавить</button>
  </form>
</div>

<?php include_once('templates/footer.php'); ?>
