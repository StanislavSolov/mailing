<?php

session_start();

if (!$_SESSION['user']) {
    header('Location: ./signUp.php');
}

require 'php/classes/User.php';

use classes\User;

$user = unserialize($_SESSION['user']);

echo "<pre>";
print_r($user);
echo "</pre>";
echo "<br>-------------------------<br>";
var_dump($user);