<?php

namespace classes;

use DateTime;
use Error;

require_once 'UserInterface.php';
require_once 'Person.php';

class User extends Person implements UserInterface
{
    private string $email, $password, $avatar, $about;
    private int $id;

    public function __construct(string $fullName, string $email, string $password, string $birthDate)
    {
        $this->setFullName($fullName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setDateOfBirth($birthDate);
    }

    public function __clone()
    {
        $this->setFullName('User');
        $this->setEmail('clonedUser');
        $this->password = 'qwerty';
    }

    public function getAge(): string
    {
        $dateOfBirth = self::getDateOfBirth();
        if ($dateOfBirth) {
            $date = new DateTime($dateOfBirth);
            $currentDate = new DateTime(date('Y-m-d'));
            $age = $date->diff($currentDate);
            return $age->y;
        } else {
            throw new Error('There is no date of birth');
        }
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAvatar(): string {
        return $this->avatar;
    }

    public function setAvatar(string $path): void {
        $this->avatar = $path;
    }

    public function getAbout(): string {
        return $this->about;
    }

    public function setAbout(string $about): void {
        $this->about = $about;
    }
}