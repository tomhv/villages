<?php

declare(strict_types=1);

namespace App\Tests\Domain\Identity;

use App\Domain\Identity\EmailAddress;
use App\Domain\Identity\UserId;
use App\Domain\Identity\UserSignedUp;
use App\Domain\Identity\Username;
use PHPUnit\Framework\TestCase;

class UserSignedUpTest extends TestCase
{
    public function test_can_be_created_with()
    {
        $userSignedUp = UserSignedUp::with(
            UserId::fromString('15c7157c-7a7c-442d-80d9-8c35ad74b615'),
            Username::fromString('tomhv'),
            EmailAddress::fromString('tom@villages.test')
        );

        $this->assertEquals(
            UserId::fromString('15c7157c-7a7c-442d-80d9-8c35ad74b615'),
            $userSignedUp->userId()
        );

        $this->assertEquals(
            Username::fromString('tomhv'),
            $userSignedUp->username()
        );

        $this->assertEquals(
            EmailAddress::fromString('tom@villages.test'),
            $userSignedUp->email()
        );
    }

    public function test_can_be_created_from_payload()
    {
        $userSignedUp = UserSignedUp::fromPayload([
            'user_id' => 'c2a5dc99-197b-429e-a552-a1fb5d1032ea',
            'username' => 'tomhv',
            'email' => 'tom@villages.test',
        ]);

        $this->assertEquals(
            UserId::fromString('c2a5dc99-197b-429e-a552-a1fb5d1032ea'),
            $userSignedUp->userId()
        );

        $this->assertEquals(
            Username::fromString('tomhv'),
            $userSignedUp->username()
        );

        $this->assertEquals(
            EmailAddress::fromString('tom@villages.test'),
            $userSignedUp->email()
        );
    }

    public function test_can_be_converted_to_payload()
    {
        $userSignedUp = UserSignedUp::with(
            UserId::fromString('43cb19ee-c317-44e8-852f-db1d94ed96db'),
            Username::fromString('tomhv'),
            EmailAddress::fromString('tom@villages.test')
        );

        $this->assertEquals(
            [
                'user_id' => '43cb19ee-c317-44e8-852f-db1d94ed96db',
                'username' => 'tomhv',
                'email' => 'tom@villages.test',
            ],
            $userSignedUp->toPayload()
        );
    }
}
