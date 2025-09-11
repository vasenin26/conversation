<?php

namespace Vasenin26\Conversation\Interface;

use Vasenin26\Conversation\Chat;

interface ConversationFactoryInterface
{

    public function fromMessages(array $messages): Chat;
}