<?php

declare(strict_types=1);

namespace App\Infrastructure\Security;

use App\Application\Identity\Query\SecurityUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

final class UserProvider implements UserProviderInterface
{
    public function loadUserByUsername(string $username)
    {
        return new SecurityUser($username);
    }

    public function refreshUser(UserInterface $user)
    {
        return $user;
    }

    public function supportsClass(string $class)
    {
        return $class == SecurityUser::class;
    }
}
