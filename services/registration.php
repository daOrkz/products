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
  
  //проверяем на существующий логин
  $count = DB::connect("SELECT `login` FROM `users` WHERE `login` = '$login'")->rowCount();
  if($count > 0) {
    $_SESSION['msg'] = 'Такой логин уже есть';

    header('Location: /');
    exit();
  }


  $password_hash = password_hash($password, PASSWORD_BCRYPT);

  DB::connect("INSERT INTO `users` SET `login` = ?, `password` = ?", [$login, $password_hash]);

  $_SESSION['msg'] = 'Вы успешно зарегистрировались!!!';

  header('Location: /');
  exit();
}



