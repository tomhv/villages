<?php

declare(strict_types=1);

namespace App\Ui\Api;

use App\Application\User\SignUp;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

final class SignUpController
{
    private $commandBus;
    private $logger;

    public function __construct(MessageBusInterface $commandBus, LoggerInterface $logger)
    {
        $this->commandBus = $commandBus;
        $this->logger = $logger;
    }

    /**
     * @Route(
     *     "/sign-up",
     *      name="app_ui_api_signup",
     *      methods={"POST"}
     * )
     */
    public function __invoke(Request $request)
    {
        $this->logger->info($request->getContent());

        $data = json_decode($request->getContent(), true);

        $userId = Uuid::v4();

        $this->commandBus->dispatch(SignUp::with(
            (string) $userId,
            $data['email'],
            $data['username']
        ));

        return new JsonResponse([
            'userId' => (string) $userId,
        ]);
    }
}
