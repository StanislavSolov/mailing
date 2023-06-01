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
        // Встановлюємо бажаний часовий пояс
        date_default_timezone_set('Europe/Kiev');
        // Отримуємо поточну дату та час з урахуванням часового поясу
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $dateOfBirth = self::getDateOfBirth();
        if ($dateOfBirth) {
            $dateBirth = new DateTime($dateOfBirth);
            $date = new DateTime($currentDate);
            $age = $dateBirth->diff($date);
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