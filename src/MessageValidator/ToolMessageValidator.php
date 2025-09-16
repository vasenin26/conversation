<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\ToolMessage;

class ToolMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return ToolMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        return isset($content['id']) && is_string($content['id']) &&
               isset($content['name']) && is_string($content['name']) &&
               isset($content['result']) && is_string($content['result']);
    }
    
    public function getValidationErrors(array $content): array
    {
        $errors = [];
        
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'id', ToolMessage::TYPE));
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'name', ToolMessage::TYPE));
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'result', ToolMessage::TYPE));
        
        return $errors;
    }
}
