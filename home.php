<?php

session_start();

if (!$_SESSION['user']) {
    header('Location: ./signUp.php');
}

require 'php/classes/User.php';

use classes\User;

$user = unserialize($_SESSION['user']);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mailing</title>
  <link rel="stylesheet" type="text/css" href="styles/home.css">
  <link rel="stylesheet" type="text/css" href="./styles/fonts.css">
  <link rel="icon" href="./imgs/icon.svg">
</head>
<body>
<section id="home">
  <div class="discover">
    <h3></h3>

  </div>
  <div class="main-content">

  </div>
  <div class="user-profile">
    <h3 class="user-profile__header">
      My profile
    </h3>
    <img src="./imgs/uploads/avatar/<?= $user->getAvatar() ?>" alt="user profile image">
    <fieldset>
      <legend><?= $user->getFullName() ?></legend>
      <p class="about"><?php
          $about = $user->getAbout();
          if ($about) echo $about;
          else echo "You can add description at profile settings";
          ?>
      </p>
      <p>Your age is: <b><?= $user->getAge() ?></b></p>
      <p>Your email is: <b><?= $user->getEmail() ?></b></p>
    </fieldset>
    <a href="#">Change user data</a>
  </div>
</section>
</body>
</html>
