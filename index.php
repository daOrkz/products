<?php

session_start();

if(!empty($_SESSION['msg'])) {
  echo $_SESSION['msg'];
}
$_SESSION['msg'] = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Document</title>
</head>
<body>

<div class="form__login__wrap">
  <form class="form__login" action="" method="POST">
    <input type="text" name="login" id="" placeholder="Login" required>
    <input type="password" name="password" id="" placeholder="Password" required>
    <button formaction="services/registration.php" type="submit">Registration</button>
    <button formaction="services/signin.php" type="submit">SignIn</button>
    <p>admin : admin</p>
    <p> user : user</p>
  </form>
</div>  
</body>
</html>