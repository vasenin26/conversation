<?php

namespace Vasenin26\Conversation;

interface Message
{
    public function getContent(): array;
    public function getType(): string;
    public static function createFromData(array $content): self;
}