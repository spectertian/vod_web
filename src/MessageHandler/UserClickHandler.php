<?php

namespace App\MessageHandler;

use App\Message\UserClick;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class UserClickHandler implements MessageHandlerInterface
{
    public function __invoke(UserClick $message)
    {
//         do something with your message
        dump($message);
    }
}
