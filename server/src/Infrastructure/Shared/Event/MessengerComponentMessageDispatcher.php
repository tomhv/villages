<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\Event;

use EventSauce\EventSourcing\Message;
use EventSauce\EventSourcing\MessageDispatcher;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerComponentMessageDispatcher implements MessageDispatcher
{
    private $eventBus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function dispatch(Message ...$messages)
    {
        foreach ($messages as $message) {
            $this->eventBus->dispatch($message->event());
        }
    }
}
