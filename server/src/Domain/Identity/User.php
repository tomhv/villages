<?php

declare(strict_types=1);

namespace App\Domain\Identity;

use EventSauce\EventSourcing\AggregateRoot;
use EventSauce\EventSourcing\AggregateRootBehaviourWithRequiredHistory;

final class User implements AggregateRoot
{
    use AggregateRootBehaviourWithRequiredHistory;

    private Username $username;
    private EmailAddress $email;

    public static function signUp(UserId $userId, Username $username, EmailAddress $email): self
    {
        $user = new self($userId);
        $user->recordThat(UserSignedUp::with($userId, $username, $email));

        return $user;
    }

    private function applyUserSignedUp(UserSignedUp $userSignedUp)
    {
        $this->username = $userSignedUp->username();
        $this->email = $userSignedUp->email();
    }

    public function userId(): UserId
    {
        return $this->aggregateRootId;
    }

    public function username(): Username
    {
        return $this->username;
    }

    public function email(): EmailAddress
    {
        return $this->email;
    }
}
