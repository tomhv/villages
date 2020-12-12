<?php

declare(strict_types=1);

namespace App\Application\Identity;

final class SignUp
{
    private $userId;
    private $email;
    private $username;

    private function __construct(string $userId, string $email, string $username)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->username = $username;
    }

    public static function with(string $userId, string $email, string $username): self
    {
        return new self($userId, $email, $username);
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function username(): string
    {
        return $this->username;
    }
}
