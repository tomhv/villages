<?php

declare(strict_types=1);

namespace App\Ui\Cli\Identity;

use App\Application\Identity\Command\SignUp;
use App\Domain\Identity\EmailAddress;
use App\Domain\Identity\User;
use App\Domain\Identity\UserId;
use App\Domain\Identity\Username;
use EventSauce\EventSourcing\AggregateRootRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Uid\Uuid;

class SignUpCommand extends Command
{
    protected static $defaultName = 'app:identity:sign-up';

    private $commandBus;
    private $logger;

    public function __construct(MessageBusInterface $commandBus, LoggerInterface $logger)
    {
        $this->commandBus = $commandBus;
        $this->logger = $logger;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->addArgument('username', InputArgument::REQUIRED)
            ->addArgument('email', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userId = (string) Uuid::v4();

        list($username, $email) = $this->args($input);

        $this->commandBus->dispatch(SignUp::with(
            $userId,
            $email,
            $username
        ));

        (new SymfonyStyle($input, $output))->definitionList(
            ['username' => $username],
            ['email' => $email],
            ['userId' => $userId],
        );

        return 0;
    }

    private function args(InputInterface $input): array
    {
        return [
            $input->getArgument('username'),
            $input->getArgument('email'),
        ];
    }
}
