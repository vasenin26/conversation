<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\GitFileMessage;

class GitFileMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return GitFileMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        return isset($content['url']) && is_string($content['url']);
    }
    
    public function getValidationErrors(array $content): array
    {
        return $this->validateRequiredStringField($content, 'url', GitFileMessage::TYPE);
    }
}


