<?php

namespace Vasenin26\Conversation\Interface;

interface MessageTypeValidatorInterface
{
    public function getSupportedType(): string;
    public function isValidContent(array $content): bool;
    public function getValidationErrors(array $content): array;
}
