<?php

declare(strict_types=1);

namespace App\Domain\Identity;

use EventSauce\EventSourcing\AggregateRootId;
use Symfony\Component\Uid\Uuid;

final class UserId implements AggregateRootId
{
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = Uuid::fromString($uuid);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return (string) $this->uuid;
    }

    public static function fromString(string $aggregateRootId): AggregateRootId
    {
        return new self($aggregateRootId);
    }
}
