<?php

namespace Alura\Calisthenics\Domain\Student;

class FullName
{
    private string $firstName;
    private string $lastName;

    public function __construct(string $lastName, string $firstName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public function __toString(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
}