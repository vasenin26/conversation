<?php

namespace Vasenin26\Conversation\Interface;

use Vasenin26\Conversation\Message;

interface Conversation
{
    public function addMessage(Message $message): void;
    public function getMessages(): array;
    public function getInstructions(): \Generator;
    public function getServices(): \Generator;
    public function serialize(): array;
}