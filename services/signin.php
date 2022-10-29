<?php

session_start();

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );
require_once( realpath(__DIR__ . '/..') .  '/connect/sqlQuery.php' );

if(empty($_POST['login']) && empty($_POST['password'])) {
  $_SESSION['msg'] = 'Вы ввели не все данные';

  header('Location: /');
  exit();
}

if(!empty($_POST['login']) && !empty($_POST['password'])) {
  $login    = strip_tags($_POST['login']);
  $password = strip_tags($_POST['password']);
  
  $data = DB::connect(sprintf($queryStr['getPswUser'], $login))->fetch(PDO::FETCH_COLUMN);
  $hash = $data;

  if(password_verify($password, $hash)) {

    $status = DB::connect(sprintf($queryStr['getUserStatus'], $login))->fetch(PDO::FETCH_ASSOC);
    // $status = DB::connect("SELECT users.login, status.name, status.status_code FROM users INNER JOIN status ON users.status_id = status.id WHERE users.login = '$login'")->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['user']['login']      = $status['login'];
    $_SESSION['user']['status']     = $status['name'];
    $_SESSION['user']['statusCode'] = $status['status_code'];

    if($_SESSION['user']['status'] == 'admin' && $_SESSION['user']['statusCode'] > 90){
      header('Location: ../pages/admin_panel.php');
    }
    if($_SESSION['user']['status'] != 'admin' && $_SESSION['user']['statusCode'] < 90){
      header('Location: ../pages/user_panel.php');
    }
  } else {
    $_SESSION['msg'] = 'Вы ввели не верный логин или пароль';
    header('Location: /');
  }

}
