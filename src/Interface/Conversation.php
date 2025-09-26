<?php

namespace Vasenin26\Conversation\Interface;

use Vasenin26\Conversation\Message;
use Vasenin26\Conversation\Messages\ServiceMessage;

interface Conversation
{
    public function addMessage(Message $message): void;

    public function addServiceMessage(ServiceMessage $message): MessageLinkInterface;
    public function getMessages(): array;
    public function getInstructions(): \Generator;
    public function getServices(): \Generator;
    public function serialize(): array;
}