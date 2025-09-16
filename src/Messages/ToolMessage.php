<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class ToolMessage implements Message
{
    const TYPE = 'tool';

    public function __construct(
        public string $id,
        public string $name,
        public string $result,
    )
    {
    }

    public function getContent(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'result' => $this->result
        ];
    }

    public function getType(): string
    {
        return self::TYPE;
    }
    
    public static function createFromData(array $content): self
    {
        return new self(
            $content['id'],
            $content['name'],
            $content['result']
        );
    }
}