<?php

declare(strict_types=1);

namespace App\Application\Identity\Query;

use Symfony\Component\Security\Core\User\UserInterface;

final class SecurityUser implements UserInterface
{
    private string $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function getRoles()
    {
        return [];
    }

    public function getPassword()
    {
        return 'foo';
    }

    public function getSalt()
    {
        return 'foo';
    }

    public function getUsername()
    {
        return $this->username();
    }

    public function eraseCredentials()
    {
    }
}
