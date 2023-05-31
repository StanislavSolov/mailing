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
  <link rel="stylesheet" type="text/css" href="styles/signIn.css">
  <link rel="stylesheet" type="text/css" href="./styles/fonts.css">
  <link rel="icon" href="./imgs/icon.svg">
</head>
<body>
<nav></nav>
<header>
  <h1>Welcome and have a nice day :)</h1>
  <img id="background" src="./imgs/background.jpg" alt="background">
  <form action="php/files/login.php" method="post">
    <fieldset>
      <legend>Authorization</legend>
      <div>
        <label for="email">Your email: </label>
        <input id="email" type="email" name="email" minlength="5" required value="<?php
        if (isset($_SESSION['userEmail'])):
            echo $_SESSION['userEmail'];
            unset($_SESSION['userEmail']);
        endif; ?>"
            <?php if (isset($_SESSION['email'])): ?>
              class="incorrect"
                <?php unset($_SESSION['email']);
            endif; ?>
        >
      </div>
      <div>
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" minlength="5" required
            <?php if (isset($_SESSION['pass'])): ?>
              class="incorrect"
                <?php unset($_SESSION['pass']);
            endif; ?>
        >
      </div>
      <div class="form-buttons">
        <button type="submit">Sign in</button>
        <button type="reset">Clear form</button>
      </div>
    </fieldset>
    <p class="hint">Want to create an account? <a href="./signUp.php">Sign up</a></p>
  </form>
</header>
</body>
</html>