<?php

declare(strict_types=1);

namespace App\Application\User;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

final class SignUpHandler implements MessageHandlerInterface
{
    private $notifier;
    private $logger;

    public function __construct(NotifierInterface $notifier, LoggerInterface $logger)
    {
        $this->notifier = $notifier;
        $this->logger = $logger;
    }

    public function __invoke(SignUp $signUp)
    {
        $this->logger->error(sprintf(
            'Sign up: %s %s %s',
            $signUp->username(),
            $signUp->email(),
            $signUp->userId()
        ));

        $notification = (new Notification("You've signed up!", ['email']))
            ->content("You've signed up for Villages!")
        ;

        // Send the notification to the recipient
        $sentMessage = $this->notifier->send($notification, new Recipient(
            $signUp->email(),
        ));
    }
}
