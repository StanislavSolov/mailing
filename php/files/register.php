<?php

session_start();

require_once '../../php/files/dbConfig.php';
require '../classes/User.php';

use classes\User;

global $conn;

$fullName = trim($_POST['fullName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$birth = $_POST['birth'];

$user = new User($fullName, $email, $password, $birth);


$pass = $user->getPassword();

$sql = "INSERT INTO User (fullName, email, password, dateOfBirth) VALUES ('$fullName', '$email', '$pass', '$birth')";

if (!$conn->query($sql)) {
    echo "Error 1: " . $conn->error;
}

$sql = "SELECT id, avatar FROM User WHERE email = '$email' AND password = '$pass'";

if($result = $conn->query($sql)){
    foreach($result as $row){
        $user->setId($row["id"]);
        $user->setAvatar($row['avatar']);
        $user->setAbout('');
    }
} else {
    echo "Error 2: " . $conn->error;
}

$_SESSION['user'] = serialize($user);

header('Location: ../../home.php');