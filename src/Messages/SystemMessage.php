<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class SystemMessage implements Message
{
    const TYPE = 'system';

    public function __construct(public string $content)
    {
    }

    public function getContent(): array
    {
        return [
            'content' => $this->content
        ];
    }

    public function getType(): string
    {
        return static::TYPE;
    }
    
    public static function createFromData(array $content): static
    {
        return new static($content['content']);
    }
}