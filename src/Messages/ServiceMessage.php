<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Enum\ServiceStatus;
use Vasenin26\Conversation\Message;

class ServiceMessage implements Message
{
    const TYPE = 'service';

    public function __construct(
        public string        $key,
        public string        $message,
        public array         $payload = [],
        public ServiceStatus $status = ServiceStatus::WAITING
    )
    {
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setError(string $error): void
    {
        $this->message = $error;
        $this->status = ServiceStatus::ERROR;
    }

    public function markCompleted(): void
    {
        $this->status = ServiceStatus::SUCCESS;
    }

    public function getContent(): array
    {
        return [
            'key' => $this->key,
            'message' => $this->message,
            'status' => $this->status->value,
            'payload' => $this->payload,
        ];
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public static function createFromData(array $content): self
    {
        return new self(
            $content['key'],
            $content['message'],
            $content['payload'] ?? [],
            ServiceStatus::tryFrom($content['status'] ?? ServiceStatus::WAITING),
        );
    }
}