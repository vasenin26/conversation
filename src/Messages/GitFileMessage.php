<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class GitFileMessage implements Message
{
    const TYPE = 'git-file';

    public function __construct(
        public string $url,
        public ?string $description = null,
    )
    {
    }

    public function getContent(): array
    {
        $content = [
            'url' => $this->url,
        ];
        
        if ($this->description !== null) {
            $content['description'] = $this->description;
        }
        
        return $content;
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public static function createFromData(array $content): Message
    {
        return new self(
            $content['url'],
            $content['description'] ?? null
        );
    }
}