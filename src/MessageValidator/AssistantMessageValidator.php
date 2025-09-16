<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\AssistantMessage;

class AssistantMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return AssistantMessage::TYPE;
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
        
        $errors = array_merge($errors, $this->validateRequiredStringField($content, 'content', AssistantMessage::TYPE));
        $errors = array_merge($errors, $this->validateOptionalArrayField($content, 'tool_calls', AssistantMessage::TYPE));
        
        return $errors;
    }
}
