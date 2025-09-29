<?php

namespace Vasenin26\Conversation\Util;

use Vasenin26\Conversation\Interface\MessageLinkInterface;
use Vasenin26\Conversation\Messages\ServiceMessage;

readonly final class ServiceMessageLink implements MessageLinkInterface
{
    public function __construct(
        private ServiceMessage $message
    )
    {
    }

    public function setMessage(string $message): void
    {
        $this->message->setMessage($message);
    }

    public function setError(string $error): void
    {
        $this->message->setError($error);
    }

    public function setPayload(array $payload): void
    {
        $this->message->setPayload($payload);
    }

    public function complete(): void
    {
        $this->message->markCompleted();
    }
}