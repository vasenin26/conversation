<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\UserMessage;

class UserMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return UserMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        return isset($content['content']) && is_string($content['content']);
    }
    
    public function getValidationErrors(array $content): array
    {
        return $this->validateRequiredStringField($content, 'content', UserMessage::TYPE);
    }
}
