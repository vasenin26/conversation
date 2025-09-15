<?php

namespace Vasenin26\Conversation\Messages;

use Vasenin26\Conversation\Message;

readonly class ToolMessage implements Message
{
    const TYPE = 'tool';

    public function __construct(
        public bool   $success,
        public string $id,
        public string $name,
        public array  $args,
        public string $result,
    )
    {
    }

    public function getContent(): array
    {
        return [
            'success' => $this->success,
            'id' => $this->id,
            'name' => $this->name,
            'args' => $this->args,
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
            $content['success'],
            $content['id'],
            $content['name'],
            $content['args'],
            $content['result']
        );
    }
}