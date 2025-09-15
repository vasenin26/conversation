<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class PageVersionMessage implements Message
{
    public function __construct(
        public string $versionId,
    )
    {
    }

    public function getContent(): array
    {
        return [
            'versionId' => $this->versionId,
        ];
    }

    public function getType(): string
    {
        return 'page-version';
    }

    public static function createFromData(array $content): Message
    {
        return new self($content['versionId']);
    }
}