<?php

session_start();

require_once './dbConfig.php';
require '../classes/User.php';

use classes\User;

global $conn;

$email = trim($_POST['email']);
$pass = trim($_POST['password']);

$sql = "SELECT * FROM User WHERE email = '$email'";

if ($res = $conn->query($sql)) {
    if ($res->num_rows >= 1) {
        foreach ($res as $row) {
            $hashedPass = $row['password'];
            $logResult = password_verify($pass, $hashedPass);

            if ($logResult) {
                $fullName = $row['fullName'];
                $dateOfBirth = $row['dateOfBirth'];

                $user = new User($fullName, $email, $hashedPass, $dateOfBirth);
                $user->setId($row['id']);
                $user->setAvatar($row['avatar']);

                if (is_null($row['about'])) {
                    $user->setAbout('');
                } else {
                    $user->setAbout($row['about']);
                }

                $_SESSION['user'] = serialize($user);

                header('Location: ../../home.php');
            } else {
                $_SESSION['pass'] = 'incorrect';
                $_SESSION['userEmail'] = $email;
                header('Location: ../../signIn.php');
            }
        }
    } else {
        $_SESSION['email'] = 'incorrect';

        header('Location: ../../signIn.php');
    }
} else {
    echo "Error login: " . $conn->error;
}
