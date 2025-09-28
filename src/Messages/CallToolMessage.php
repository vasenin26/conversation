<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class CallToolMessage implements Message
{
    const TYPE = 'call-tool';

    public function __construct(
        public string $description,
        public string $name,
        public array $args,
    )
    {
    }

    public function getContent(): array
    {
        return [
            'description' => $this->description,
            'name' => $this->name,
            'args' => $this->args,
        ];
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public static function createFromData(array $content): self
    {
        return new self(
            $content['description'],
            $content['name'],
            $content['args'],
        );
    }
}