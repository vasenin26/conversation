<?php

namespace Vasenin26\Conversation\Interface;

interface MessageValidatorInterface
{
    public function isValidMessage(array $messageData): bool;
    public function getValidationErrors(array $messageData): array;
}
