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
  <title>Document</title>
</head>
<body>

<form action="" method="POST">
  <input type="text" name="login" id="" required>
  <input type="password" name="password" id="" required>
  <button formaction="services/registration.php" type="submit">Registration</button>
  <button formaction="services/signin.php" type="submit">SignIn</button>
  <p>admin : admin</p>
  <p> user : user</p>
</form>
  
</body>
</html>