<?php

session_start();

require_once( realpath(__DIR__ . '/..') .  '/connect/connect.php' );

if(empty($_POST['login']) && empty($_POST['password'])) {
  $_SESSION['msg'] = 'Вы ввели не все данные';

  header('Location: /');
  exit();
}

if(!empty($_POST['login']) && !empty($_POST['password'])) {
  $login = strip_tags($_POST['login']);
  $password = strip_tags($_POST['password']);
  
  $data = DB::connect("SELECT * FROM `users` WHERE `login` = '$login'")->fetchAll(PDO::FETCH_ASSOC);
  $hash = $data[0]['password'];

  $_SESSION['user']['login'] = $data[0]['login'];
  $_SESSION['user']['status'] = $data[0]['status'];

  if(password_verify($password, $hash)) {
    header('Location: ../pages/admin_panel.php');
  } else {
    $_SESSION['msg'] = 'Вы ввели не верный логин или пароль';
    header('Location: /');
  }

}