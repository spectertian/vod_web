<?php

namespace App\EventSubscriber;

use App\DocumentRepository\ListsRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Service\UrlContainerInterface;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;

class SitemapSubscriber implements EventSubscriberInterface
{
    private $listsRepository;

    public function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function onEventSubscriberInterface($event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            SitemapPopulateEvent::class => 'populate',
        ];
    }

    /**
     * @param SitemapPopulateEvent $event
     */
    public function populate(SitemapPopulateEvent $event): void
    {
        $this->registerDetailUrls($event->getUrlContainer(), $event->getUrlGenerator());
    }

    /**
     * @param UrlContainerInterface $urls
     * @param UrlGeneratorInterface $router
     */
    public function registerDetailUrls(UrlContainerInterface $urls, UrlGeneratorInterface $router): void
    {
        $all = [
            'index', 'dz', 'kh', 'aq', 'xj', 'kb', 'zz', 'jq', 'jl', 'dh', 'dsj', 'message', 'news'
        ];
        foreach ($all as $v) {
            $urls->addUrl(
                new UrlConcrete($router->generate($v, [], UrlGeneratorInterface::ABSOLUTE_URL)
                ),
                'list'
            );
        }

        $lists = $this->listsRepository->findAll();
        foreach ($lists as $info) {
            $urls->addUrl(
                new UrlConcrete($router->generate('detail', ['id' => $info->getId()], UrlGeneratorInterface::ABSOLUTE_URL)
                ),
                'detail'
            );
        }
    }
}
