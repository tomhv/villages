<?php

declare(strict_types=1);

namespace App\Tests\Domain\Identity;

use App\Domain\Identity\Username;
use PHPUnit\Framework\TestCase;

class UsernameTest extends TestCase
{
    public function test_can_be_created_from_string()
    {
        $username = Username::fromString('tomhv');

        $this->assertSame(
            'tomhv',
            (string) $username
        );
    }
}
