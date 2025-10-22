<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\ServiceMessage;
use Vasenin26\Conversation\Enum\ServiceStatus;
use Vasenin26\Conversation\Messages\SliceMessage;

class SliceMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return SliceMessage::TYPE;
    }

    public function isValidContent(array $content): bool
    {
        // Проверяем обязательное поле key
        if (!isset($content['key']) || !is_string($content['key'])) {
            return false;
        }

        // Проверяем обязательное поле message
        if (!isset($content['message']) || !is_string($content['message'])) {
            return false;
        }

        // payload может отсутствовать или быть массивом
        if (isset($content['payload']) && !is_array($content['payload'])) {
            return false;
        }

        // status может отсутствовать или быть валидным ServiceStatus
        if (isset($content['status'])) {
            if (ServiceStatus::tryFrom($content['status']) === null) {
                return false;
            }
        }

        return true;
    }

    public function getValidationErrors(array $content): array
    {
        $errors = [];

        // Проверяем обязательное поле key
        $keyErrors = $this->validateRequiredStringField($content, 'key', SliceMessage::TYPE);
        $errors = array_merge($errors, $keyErrors);

        // Проверяем обязательное поле message
        $messageErrors = $this->validateRequiredStringField($content, 'message', SliceMessage::TYPE);
        $errors = array_merge($errors, $messageErrors);

        // Проверяем опциональное поле payload
        $payloadErrors = $this->validateOptionalArrayField($content, 'payload', SliceMessage::TYPE);
        $errors = array_merge($errors, $payloadErrors);

        // Проверяем опциональное поле status
        if (isset($content['status'])) {
            if (ServiceStatus::tryFrom($content['status']) === null) {
                $validStatuses = array_map(fn($case) => $case->value, ServiceStatus::cases());
                $errors[] = "Invalid status value for " . SliceMessage::TYPE . ". Valid values are: " . implode(', ', $validStatuses);
            }
        }

        return $errors;
    }
}
