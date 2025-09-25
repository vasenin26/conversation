<?php

namespace Vasenin26\Conversation\Factory;

use Vasenin26\Conversation\Interface\MessageTypeValidatorFactoryInterface;
use Vasenin26\Conversation\Interface\MessageTypeValidatorInterface;
use Vasenin26\Conversation\MessageValidator\AssistantMessageValidator;
use Vasenin26\Conversation\MessageValidator\SystemMessageValidator;
use Vasenin26\Conversation\MessageValidator\ToolMessageValidator;
use Vasenin26\Conversation\MessageValidator\UserMessageValidator;
use Vasenin26\Conversation\MessageValidator\UserTaskMessageValidator;
use Vasenin26\Conversation\MessageValidator\ServiceMessageValidator;
use Vasenin26\Conversation\MessageValidator\PageVersionMessageValidator;
use Vasenin26\Conversation\MessageValidator\GitFileMessageValidator;
use Vasenin26\Conversation\MessageValidator\InfoMessageValidator;
use Vasenin26\Conversation\MessageValidator\DisappearingMessageValidator;
use Vasenin26\Conversation\Messages\UserMessage;
use Vasenin26\Conversation\Messages\UserTaskMessage;
use Vasenin26\Conversation\Messages\ServiceMessage;
use Vasenin26\Conversation\Messages\SystemMessage;
use Vasenin26\Conversation\Messages\AssistantMessage;
use Vasenin26\Conversation\Messages\ToolMessage;
use Vasenin26\Conversation\Messages\PageVersionMessage;
use Vasenin26\Conversation\Messages\GitFileMessage;
use Vasenin26\Conversation\Messages\InfoMessage;
use Vasenin26\Conversation\Messages\DisappearingMessage;

class MessageTypeValidatorFactory implements MessageTypeValidatorFactoryInterface
{
    private array $validators = [];
    
    public function __construct()
    {
        $this->validators = [
            UserMessage::TYPE => new UserMessageValidator(),
            UserTaskMessage::TYPE => new UserTaskMessageValidator(),
            ServiceMessage::TYPE => new ServiceMessageValidator(),
            SystemMessage::TYPE => new SystemMessageValidator(),
            AssistantMessage::TYPE => new AssistantMessageValidator(),
            ToolMessage::TYPE => new ToolMessageValidator(),
            PageVersionMessage::TYPE => new PageVersionMessageValidator(),
            GitFileMessage::TYPE => new GitFileMessageValidator(),
            InfoMessage::TYPE => new InfoMessageValidator(),
            DisappearingMessage::TYPE => new DisappearingMessageValidator(),
        ];
    }
    
    public function getValidator(string $messageType): ?MessageTypeValidatorInterface
    {
        return $this->validators[$messageType] ?? null;
    }
    
    public function getSupportedTypes(): array
    {
        return array_keys($this->validators);
    }
}
