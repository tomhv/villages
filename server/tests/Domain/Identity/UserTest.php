<?php

declare(strict_types=1);

namespace App\Tests\Domain\Identity;

use App\Domain\Identity\EmailAddress;
use App\Domain\Identity\User;
use App\Domain\Identity\UserId;
use App\Domain\Identity\Username;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_can_sign_up()
    {
        $user = User::signUp(
            UserId::fromString('82ab72d1-5711-4b17-a3e7-51828c16206d'),
            Username::fromString('tomhv'),
            EmailAddress::fromString('tom@villages.test')
        );

        $this->assertEquals(
            UserId::fromString('82ab72d1-5711-4b17-a3e7-51828c16206d'),
            $user->userId()
        );

        $this->assertEquals(
            Username::fromString('tomhv'),
            $user->username()
        );

        $this->assertEquals(
            EmailAddress::fromString('tom@villages.test'),
            $user->email()
        );
    }
}
