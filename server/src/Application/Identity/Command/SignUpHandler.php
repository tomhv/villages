<?php

declare(strict_types=1);

namespace App\Application\Identity\Command;

use App\Domain\Identity\EmailAddress;
use App\Domain\Identity\User;
use App\Domain\Identity\UserId;
use App\Domain\Identity\Username;
use EventSauce\EventSourcing\AggregateRootRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

final class SignUpHandler implements MessageHandlerInterface
{
    private AggregateRootRepository $identityUserRepository;
    private NotifierInterface $notifier;
    private LoggerInterface $logger;

    public function __construct(AggregateRootRepository $identityUserRepository, NotifierInterface $notifier, LoggerInterface $logger)
    {
        $this->identityUserRepository = $identityUserRepository;
        $this->notifier = $notifier;
        $this->logger = $logger;
    }

    public function __invoke(SignUp $signUp)
    {
        $this->identityUserRepository->persist(User::signUp(
            UserId::fromString($signUp->userId()),
            Username::fromString($signUp->username()),
            EmailAddress::fromString($signUp->email())
        ));

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
