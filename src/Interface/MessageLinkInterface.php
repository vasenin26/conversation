<?php

namespace Vasenin26\Conversation\Interface;

interface MessageLinkInterface
{
    public function setMessage(string $message): void;

    public function setError(string $error): void;

    public function complete(): void;
}