<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class AssistantMessage implements Message
{
    const TYPE = 'assistant';

    public function __construct(
        public string $content,
        public array $toolCallsArray
    )
    {
    }

    public function getContent(): array
    {
        return [
            'content' => $this->content,
            'tool_calls' => $this->toolCallsArray
        ];
    }

    public function getType(): string
    {
        return self::TYPE;
    }
    
    public static function createFromData(array $content): self
    {
        return new self(
            $content['content'] ?? '',
            $content['tool_calls'] ?? []
        );
    }
}