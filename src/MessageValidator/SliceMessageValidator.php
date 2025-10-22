<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\SliceMessage;

class SliceMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return SliceMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        return isset($content['content']) && is_string($content['content']);
    }
    
    public function getValidationErrors(array $content): array
    {
        return $this->validateRequiredStringField($content, 'content', SliceMessage::TYPE);
    }
}
