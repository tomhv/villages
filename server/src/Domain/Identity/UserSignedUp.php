<?php

declare(strict_types=1);

namespace App\Domain\Identity;

final class UserSignedUp
{
    private UserId $userId;
    private Username $username;
    private EmailAddress $email;

    private function __construct(UserId $userId, Username $username, EmailAddress $email)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
    }

    public static function with(UserId $userId, Username $username, EmailAddress $email)
    {
        return new self($userId, $username, $email);
    }

    public function toPayload(): array
    {
        return [
            'user_id' => (string) $this->userId,
            'username' => (string) $this->username,
            'email' => (string) $this->email,
        ];
    }

    public static function fromPayload(array $payload): self
    {
        return self::with(
            UserId::fromString($payload['user_id']),
            Username::fromString($payload['username']),
            EmailAddress::fromString($payload['email'])
        );
    }

    public function userId(): UserId
    {
        return $this->userId;
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
