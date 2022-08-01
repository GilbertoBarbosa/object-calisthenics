<?php

namespace Alura\Calisthenics\Domain\Email;

class email
{
    private string $email;

    public function __construct(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $this->email = $email;
        }

        $this->email = $email;
    }

    public function __toString()
    {
        return $this->email;
    }
}

