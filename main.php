<?php
//  session_destroy();
  session_start();
//  print_r($_SERVER['HTTP_USER_AGENT']);
//  print_r($_SERVER['REQUEST_URI']);
//  print_r($_SERVER['PHP_AUTH_USER']);
//  print_r($_SERVER['REMOTE_ADDR']);
//  print_r($_SERVER['HTTP_REFERER']);
//echo date('Y-m-d');
//use classes\User;
//require_once 'php/classes/User.php';
//$test = new User();
//$test->setDateOfBirth('2003-12-22');
//echo $test->getAge();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mailing</title>
  <link rel="stylesheet" type="text/css" href="./styles/main.css">
  <link rel="stylesheet" type="text/css" href="./styles/fonts.css">
</head>
<body>
<nav></nav>
<header>
  <h1>Welcome and have a nice day :)</h1>
  <img id="background" src="./imgs/background.jpg" alt="background">
  <form action="./php/files/signup.php" method="post">
    <fieldset>
      <legend>Registration</legend>
      <div>
        <label for="fullName">Your full name: </label>
        <input id="fullName" type="text" name="fullName" minlength="5" required>
      </div>
      <div>
        <label for="email">Your email: </label>
        <input id="email" type="email" name="email" minlength="5" required>
      </div>
      <div>
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" minlength="5" required>
      </div>
      <div>
        <label for="password2">Repeat your password: </label>
        <input id="password2" type="password" name="password2" minlength="5" required>
      </div>
      <div>
        <label for="birth">Date of birth: </label>
        <input id="birth" type="date" name="birth" required>
      </div>
      <div class="form-buttons">
        <button type="submit">Sign up</button>
        <button type="reset">Clear form</button>
      </div>
    </fieldset>
    <p>Already have an account? <a href="#">Sign in</a></p>
  </form>
</header>
<script src="./scripts/main.js"></script>
</body>
</html>