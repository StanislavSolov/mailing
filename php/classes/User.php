<?php

namespace classes;

use DateTime;

require_once 'UserInterface.php';
require_once 'Person.php';

class User extends Person implements UserInterface
{
    private $email, $password;

    public function getAge($birth)
    {
        $dateOfBirth = new DateTime($birth);
        $currentDate = new DateTime('Y-m-d');
        $age = $dateOfBirth->diff($currentDate);
        return $age->y;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


}