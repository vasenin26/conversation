<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class UserTaskMessage implements Message
{
    const TYPE = 'user-task';

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
        return self::TYPE;
    }
    
    public static function createFromData(array $content): self
    {
        return new self($content['content']);
    }
}