<?php

declare(strict_types=1);

namespace App\Application\User;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SignUpHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
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
    }
}
