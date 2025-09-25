<?php

namespace Vasenin26\Conversation\Interface;

interface ConversationFactoryInterface
{

    public function fromMessages(array $messages): Conversation;
}