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
        return isset($content['url']) && is_string($content['url']) &&
               (!isset($content['description']) || is_string($content['description']));
    }
    
    public function getValidationErrors(array $content): array
    {
        $errors = [];
        
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'url', GitFileMessage::TYPE));
        
        if (isset($content['description']) && !is_string($content['description'])) {
            $errors[] = "Field 'description' must be a string for ".GitFileMessage::TYPE." message";
        }
        
        return $errors;
    }
}
