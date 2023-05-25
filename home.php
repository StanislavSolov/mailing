<?php

session_start();

use classes\User;

require 'php/classes/User.php';

echo "<h1>Home</h1>";
$user = unserialize($_SESSION['user']);
$nameUser = $user->getFullName();
echo "<p>Registered user's name is: $nameUser</p>";

$user2 = new User('User2', '123@gmail.com','password','2003-12-12');

$user2Name = $user2->getFullName();

echo "<p>Test 2 user's name is: $user2Name</p>";
$user3 = new User('User3','slavaUkraini@gmail.com','pass','2000-01-01');
$nameUser3 = $user3->getFullName();
echo "<p>Test 3 user's name <mark>BEFORE</mark> changing: $nameUser3</p>";
$user3->setFullName('Changed User3 name');
$nameUser3 = $user3->getFullName();
echo "<p>Test 3 user's name <mark>AFTER</mark> changing: $nameUser3</p>";

$clonedUser = clone $user3;
echo "cloned user: ";

echo "<pre>";
print_r($clonedUser);
echo "</pre>";



