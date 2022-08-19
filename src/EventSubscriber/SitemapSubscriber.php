<?php

namespace App\EventSubscriber;

use App\DocumentRepository\VodListRepository;
use App\DocumentRepository\VodWyListRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Service\UrlContainerInterface;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;


class SitemapSubscriber implements EventSubscriberInterface
{
    private $vodWyListRepository;
    private $vodListRepository;

    public function __construct(VodWyListRepository $vodWyListRepository, VodListRepository $vodListRepository)
    {
        $this->vodWyListRepository = $vodWyListRepository;
        $this->vodListRepository   = $vodListRepository;
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
            'index', 'search', 'dy', 'tv', 'zy', 'dm', 'show_category', 'show_category_sq', 'search_m', 'wy'
        ];
        foreach ($all as $v) {
            $urls->addUrl(
                new UrlConcrete($router->generate($v, [], UrlGeneratorInterface::ABSOLUTE_URL)
                ),
                'list'
            );
        }

        $lists = $this->vodListRepository->findBy([],[],10);
        foreach ($lists as $info) {
            $urls->addUrl(
                new UrlConcrete($router->generate('detail', ['id' => $info->getId()], UrlGeneratorInterface::ABSOLUTE_URL)
                ),
                'detail'
            );
        }

        $lists = $this->vodWyListRepository->findBy([],[],10);
        foreach ($lists as $info) {
            $urls->addUrl(
                new UrlConcrete($router->generate('play_sq', ['s_id' => $info->getId(), 'p_id' => 0], UrlGeneratorInterface::ABSOLUTE_URL)
                ),
                'play_adu'
            );
        }


    }
}
