<?php

namespace Vasenin26\Conversation\Factory;

use Vasenin26\Conversation\Interface\MessageTypeValidatorFactoryInterface;
use Vasenin26\Conversation\Interface\MessageTypeValidatorInterface;
use Vasenin26\Conversation\MessageValidator\AssistantMessageValidator;
use Vasenin26\Conversation\MessageValidator\SystemMessageValidator;
use Vasenin26\Conversation\MessageValidator\ToolMessageValidator;
use Vasenin26\Conversation\MessageValidator\UserMessageValidator;

class MessageTypeValidatorFactory implements MessageTypeValidatorFactoryInterface
{
    private array $validators = [];
    
    public function __construct()
    {
        $this->validators = [
            'user' => new UserMessageValidator(),
            'system' => new SystemMessageValidator(),
            'assistant' => new AssistantMessageValidator(),
            'tool' => new ToolMessageValidator(),
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
