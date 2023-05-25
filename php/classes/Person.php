<?php

namespace classes;

abstract class Person
{
    private $fullName, $dateOfBirth;

    public function getFullName() {
        return $this->fullName;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }
}