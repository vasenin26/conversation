<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

class DisappearingMessage implements Message
{
    const TYPE = 'disappear';

    public function __construct(public string $content)
    {
    }

    public function getContent(): array
    {
        return [];
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public static function createFromData(array $content): Message
    {
        return new self($content['content']);
    }
}