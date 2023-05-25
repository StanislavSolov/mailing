<?php
session_start();
require 'php/classes/User.php';

echo "<pre>";
print_r($_SESSION);
print_r($_SESSION['user']);

echo "</pre>";

echo "<h1>Home</h1>";
$user = unserialize($_SESSION['user']);
echo "<pre>";
print_r($user);
print_r($user->getFullName());
echo "</pre>";

$user->getFullName();
$user->getAge();