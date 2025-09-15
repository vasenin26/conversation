<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class GitFileMessage implements Message
{
    public function __construct(
        public string $url,
    )
    {
    }

    public function getContent(): array
    {
        return [
            'url' => $this->url,
        ];
    }

    public function getType(): string
    {
        return 'git-file';
    }

    public static function createFromData(array $content): Message
    {
        return new self($content['url']);
    }
}