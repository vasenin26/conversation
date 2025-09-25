<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\ServiceMessage;

class ServiceMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return ServiceMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        if (!isset($content['key']) || !is_string($content['key'])) {
            return false;
        }
        
        // payload может отсутствовать или быть массивом
        if (isset($content['payload']) && !is_array($content['payload'])) {
            return false;
        }
        
        return true;
    }
    
    public function getValidationErrors(array $content): array
    {
        $errors = [];
        
        // Проверяем обязательное поле key
        $keyErrors = $this->validateRequiredStringField($content, 'key', ServiceMessage::TYPE);
        $errors = array_merge($errors, $keyErrors);
        
        // Проверяем опциональное поле payload
        $payloadErrors = $this->validateOptionalArrayField($content, 'payload', ServiceMessage::TYPE);
        $errors = array_merge($errors, $payloadErrors);
        
        return $errors;
    }
}
