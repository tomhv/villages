<?php

declare(strict_types=1);

namespace App\Tests\Domain\Identity;

use App\Domain\Identity\UserId;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
{
    public function test_can_be_created_from_uuid_string()
    {
        $userId = UserId::fromString('7bf3ab76-d5e6-4190-aa8e-5e384b12a880');

        $this->assertSame(
            '7bf3ab76-d5e6-4190-aa8e-5e384b12a880',
            (string) $userId
        );
    }
}
