<?php

namespace Vasenin26\Conversation\Enum;

enum ServiceStatus: string
{
    case WAITING = 'wait';
    case PROCESSING = 'processing';
    case SUCCESS = 'success';
    case ERROR = 'error';

}