<?php

namespace Vasenin26\Conversation;

use Vasenin26\Conversation\Interface\Conversation;
use Vasenin26\Conversation\Interface\MessageLinkInterface;
use Vasenin26\Conversation\Messages\DisappearingMessage;
use Vasenin26\Conversation\Messages\ServiceMessage;
use Vasenin26\Conversation\Messages\UserMessage;
use Vasenin26\Conversation\Messages\UserTaskMessage;
use Vasenin26\Conversation\Util\ServiceMessageLink;

class Chat implements Conversation
{
    public function __construct(
        private array $messages = []
    )
    {
    }

    public function addMessage(Message $message): void
    {
        $this->messages[] = $message;
    }

    public function addServiceMessage(ServiceMessage $message): MessageLinkInterface
    {
        $this->addMessage($message);

        return new ServiceMessageLink($message);
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function getInstructions(): \Generator
    {
        foreach ($this->messages as $message) {
            if ($message instanceof UserTaskMessage) {
                yield $message;
            }
        }
    }

    public function getServices(): \Generator
    {
        foreach ($this->messages as $message) {
            if ($message instanceof ServiceMessage) {
                yield $message;
            }
        }
    }

    public function serialize(): array
    {
        $messages = [];

        foreach ($this->messages as $message) {

            if ($message instanceof DisappearingMessage) {
                continue;
            }

            $messages[] = [
                'type' => $message->getType(),
                'message' => $message->getContent(),
            ];
        }

        return $messages;
    }

    public function hasNoUserAnswer(): bool
    {
        $messages = $this->getMessages();

        if (empty($messages)) {
            return false;
        }

        $lastElementArray = array_slice($messages, -1);
        $lastElement = $lastElementArray[0];

        return $lastElement instanceof UserMessage;
    }
}