<?php
session_start();
require_once '../../php/files/dbConfig.php';
require '../classes/User.php';

use classes\User;

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$birth = $_POST['birth'];
$user = new User($fullName, $email, $password, $birth);
$_SESSION['user'] = serialize($user);

header('Location: ../../home.php');