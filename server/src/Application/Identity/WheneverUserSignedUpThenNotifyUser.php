<?php

declare(strict_types=1);

namespace App\Application\Identity;

use App\Domain\Identity\UserSignedUp;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

class WheneverUserSignedUpThenNotifyUser implements MessageSubscriberInterface
{
    private NotifierInterface $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public static function getHandledMessages(): iterable
    {
        yield UserSignedUp::class;
    }

    public function __invoke(UserSignedUp $userSignedUp)
    {
        $sentEmail = $this->notifier->send(
            (new Notification('You\'ve signed up!', ['email']))
                ->content('You\'ve signed up for Villages!'),
            new Recipient((string) $userSignedUp->email())
        );
    }
}
