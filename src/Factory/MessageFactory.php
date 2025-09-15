<?php

namespace Vasenin26\Conversation\Factory;

use Vasenin26\Conversation\Interface\MessageFactoryInterface;
use Vasenin26\Conversation\Message;
use Vasenin26\Conversation\Messages\AssistantMessage;
use Vasenin26\Conversation\Messages\SystemMessage;
use Vasenin26\Conversation\Messages\ToolMessage;
use Vasenin26\Conversation\Messages\UserMessage;
use Vasenin26\Conversation\Messages\PageVersionMessage;
use Vasenin26\Conversation\Messages\GitFileMessage;

class MessageFactory implements MessageFactoryInterface
{
    public function createMessage(string $type, array $content): Message
    {
        return match ($type) {
            UserMessage::TYPE => UserMessage::createFromData($content),
            SystemMessage::TYPE => SystemMessage::createFromData($content),
            AssistantMessage::TYPE => AssistantMessage::createFromData($content),
            ToolMessage::TYPE => ToolMessage::createFromData($content),
            PageVersionMessage::TYPE => PageVersionMessage::createFromData($content),
            GitFileMessage::TYPE => GitFileMessage::createFromData($content),
            default => throw new \InvalidArgumentException("Unknown message type: {$type}")
        };
    }
    
    public function getSupportedTypes(): array
    {
        return [
            UserMessage::TYPE,
            SystemMessage::TYPE,
            AssistantMessage::TYPE,
            ToolMessage::TYPE,
            PageVersionMessage::TYPE,
            GitFileMessage::TYPE,
        ];
    }
}
