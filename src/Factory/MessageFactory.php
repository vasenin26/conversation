<?php

namespace Vasenin26\Conversation\Factory;

use Vasenin26\Conversation\Interface\MessageFactoryInterface;
use Vasenin26\Conversation\Message;
use Vasenin26\Conversation\Messages\AssistantMessage;
use Vasenin26\Conversation\Messages\SliceMessage;
use Vasenin26\Conversation\Messages\SystemMessage;
use Vasenin26\Conversation\Messages\ToolMessage;
use Vasenin26\Conversation\Messages\UserMessage;
use Vasenin26\Conversation\Messages\UserTaskMessage;
use Vasenin26\Conversation\Messages\ServiceMessage;
use Vasenin26\Conversation\Messages\PageVersionMessage;
use Vasenin26\Conversation\Messages\GitFileMessage;
use Vasenin26\Conversation\Messages\InfoMessage;
use Vasenin26\Conversation\Messages\DisappearingMessage;
use Vasenin26\Conversation\Messages\CallToolMessage;

class MessageFactory implements MessageFactoryInterface
{
    public function createMessage(string $type, array $content): Message
    {
        return match ($type) {
            UserMessage::TYPE => UserMessage::createFromData($content),
            UserTaskMessage::TYPE => UserTaskMessage::createFromData($content),
            ServiceMessage::TYPE => ServiceMessage::createFromData($content),
            SliceMessage::TYPE => SliceMessage::createFromData($content),
            SystemMessage::TYPE => SystemMessage::createFromData($content),
            AssistantMessage::TYPE => AssistantMessage::createFromData($content),
            ToolMessage::TYPE => ToolMessage::createFromData($content),
            PageVersionMessage::TYPE => PageVersionMessage::createFromData($content),
            GitFileMessage::TYPE => GitFileMessage::createFromData($content),
            InfoMessage::TYPE => InfoMessage::createFromData($content),
            DisappearingMessage::TYPE => DisappearingMessage::createFromData($content),
            CallToolMessage::TYPE => CallToolMessage::createFromData($content),
            default => throw new \InvalidArgumentException("Unknown message type: {$type}")
        };
    }
    
    public function getSupportedTypes(): array
    {
        return [
            UserMessage::TYPE,
            UserTaskMessage::TYPE,
            ServiceMessage::TYPE,
            SliceMessage::TYPE,
            SystemMessage::TYPE,
            AssistantMessage::TYPE,
            ToolMessage::TYPE,
            PageVersionMessage::TYPE,
            GitFileMessage::TYPE,
            InfoMessage::TYPE,
            DisappearingMessage::TYPE,
            CallToolMessage::TYPE,
        ];
    }
}
