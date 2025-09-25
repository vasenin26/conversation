<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class ServiceMessage implements Message
{
    const TYPE = 'service';

    public function __construct(
        public string $key,
        public array $payload = []
    )
    {
    }

    public function getContent(): array
    {
        return [
            'key' => $this->key,
            'payload' => $this->payload,
        ];
    }

    public function getType(): string
    {
        return self::TYPE;
    }
    
    public static function createFromData(array $content): self
    {
        return new self($content['key'], $content['payload'] ?? []);
    }
}