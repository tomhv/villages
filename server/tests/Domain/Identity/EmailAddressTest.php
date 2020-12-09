<?php

declare(strict_types=1);

namespace App\Tests\Domain\Identity;

use App\Domain\Identity\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function test_can_be_created_from_string()
    {
        $email = EmailAddress::fromString('tomhv');

        $this->assertSame(
            'tomhv',
            (string) $email
        );
    }
}
