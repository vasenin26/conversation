<?php

namespace Vasenin26\Conversation\Interface;

interface MessageTypeValidatorFactoryInterface
{
    public function getValidator(string $messageType): ?MessageTypeValidatorInterface;
    public function getSupportedTypes(): array;
}
