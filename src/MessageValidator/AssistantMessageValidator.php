<?php

namespace Vasenin26\Conversation\MessageValidator;

class AssistantMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return 'assistant';
    }
    
    public function isValidContent(array $content): bool
    {
        // tool_calls может отсутствовать или быть пустым массивом
        if (isset($content['tool_calls'])) {
            return is_array($content['tool_calls']);
        }
        
        return true;
    }
    
    public function getValidationErrors(array $content): array
    {
        $errors = [];
        
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'content', 'assistant'));
        $errors = array_merge($errors, $this->validateOptionalArrayField($content, 'tool_calls', 'assistant'));
        
        return $errors;
    }
}
