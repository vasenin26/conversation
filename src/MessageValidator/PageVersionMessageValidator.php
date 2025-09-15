<?php

namespace Vasenin26\Conversation\MessageValidator;

use Vasenin26\Conversation\Messages\PageVersionMessage;

class PageVersionMessageValidator extends AbstractMessageTypeValidator
{
    public function getSupportedType(): string
    {
        return PageVersionMessage::TYPE;
    }
    
    public function isValidContent(array $content): bool
    {
        return isset($content['versionId']) && is_string($content['versionId']);
    }
    
    public function getValidationErrors(array $content): array
    {
        return $this->validateRequiredStringField($content, 'versionId', PageVersionMessage::TYPE);
    }
}


