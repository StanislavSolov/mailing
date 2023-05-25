<?php

namespace classes;

abstract class Person
{
    private string $fullName, $dateOfBirth;

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }
}