<?php

namespace Vasenin26\Conversation\Factory;

use Vasenin26\Conversation\Chat;
use Vasenin26\Conversation\Interface\ConversationFactoryInterface;
use Vasenin26\Conversation\Interface\MessageFactoryInterface;
use Vasenin26\Conversation\Interface\MessageValidatorInterface;

class ConversationFactory implements ConversationFactoryInterface
{
    private MessageValidatorInterface $validator;
    private MessageFactoryInterface $messageFactory;
    
    public function __construct(
        ?MessageValidatorInterface $validator = null,
        ?MessageFactoryInterface $messageFactory = null
    ) {
        $this->validator = $validator ?? new \Vasenin26\Conversation\MessageValidator\CompositeMessageValidator(
            new MessageTypeValidatorFactory()
        );
        $this->messageFactory = $messageFactory ?? new MessageFactory();
    }
    
    public function fromMessages(array $messages): Chat
    {
        $chat = new Chat();
        
        foreach ($messages as $messageData) {
            if (!$this->validator->isValidMessage($messageData)) {
                // Пропускаем невалидные сообщения
                continue;
            }
            
            $message = $this->messageFactory->createMessage(
                $messageData['type'],
                $messageData['message']
            );
            $chat->addMessage($message);
        }
        
        return $chat;
    }
}
