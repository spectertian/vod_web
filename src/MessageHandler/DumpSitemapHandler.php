<?php

namespace App\MessageHandler;

use App\Message\DumpSitemap;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class DumpSitemapHandler implements MessageHandlerInterface
{
    public function __invoke(DumpSitemap $message)
    {
        // do something with your message
    }
}
