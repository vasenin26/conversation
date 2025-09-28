<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\CallToolMessage;

class CallToolMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return CallToolMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        return isset($content['description']) && is_string($content['description']) &&
               isset($content['name']) && is_string($content['name']) &&
               isset($content['args']) && is_array($content['args']);
    }
    
    public function getValidationErrors(array $content): array
    {
        $errors = [];
        
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'description', CallToolMessage::TYPE));
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'name', CallToolMessage::TYPE));
        
        // Валидация поля args
        if (!isset($content['args'])) {
            $errors[] = "Missing required field: args for " . CallToolMessage::TYPE . " message";
        } elseif (!is_array($content['args'])) {
            $errors[] = "Field 'args' must be an array for " . CallToolMessage::TYPE . " message";
        }
        
        return $errors;
    }
}
