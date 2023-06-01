<?php

session_start();

if (!$_SESSION['user']) {
    header('Location: ./signUp.php');
}

require 'php/classes/User.php';
require './php/files/dbConfig.php';

use classes\User;

global $conn;

$user = unserialize($_SESSION['user']);

if (isset($user)) {
    // Встановлюємо бажаний часовий пояс
    date_default_timezone_set('Europe/Kiev');
    // Отримуємо поточну дату та час з урахуванням часового поясу
    $currentDateTime = new DateTime('now');
    $currentDate = $currentDateTime->format('Y-m-d');

    //Logs.txt
    $userEmail = $user->getEmail();
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $uri = $_SERVER['REQUEST_URI'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $ref = $_SERVER['HTTP_REFERER'] ?? 'undefined';
    $entryLine = "Date: $currentDate - IP: $ip | Agent: $agent | URL: $uri | Referrer: $ref | User: $userEmail \n\n\n";
    $fp = fopen("logs.txt", "a");
    fputs($fp, $entryLine);
    fclose($fp);

    //Logs in DB
    $sql = "DELETE FROM Logs WHERE (date != '$currentDate')";
    $conn->query($sql);

    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT * FROM Logs WHERE ipAddress = '$ipAddress'";
    $res = $conn->query($sql);

    if ($res->num_rows >= 1) {
        foreach ($res as $row) {
            $hits = $row['hits'];
            $hits++;
            $conn->query("UPDATE Logs SET hits = $hits WHERE ipAddress = '$ipAddress'");
        }
    } else {
        $conn->query("INSERT INTO Logs (ipAddress, date, hits) VALUES ('$ipAddress', '$currentDate', 0)");
    }
}

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
