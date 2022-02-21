<?php

namespace App\Controller;

use App\DocumentRepository\IndexListRepository;
use App\DocumentRepository\TopicRepository;
use App\DocumentRepository\VodListRepository;
use App\Message\UserClick;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index.html', name: 'index', options: ['sitemap' => true])]
    public function index(VodListRepository $vodListRepository, RecommendList $recommendList): Response
    {
        $topicList = $recommendList->getTopic();
        $hotPlay   = $recommendList->getHotPlay();
        $dsj       = $recommendList->getHotDsj();
        $movie     = $recommendList->getHotMovie();
        $zy        = $recommendList->getHotZy();
        $dm        = $recommendList->getHotDm();
        $jlp       = $recommendList->getHotJlp();
        $sport     = $recommendList->getHotSport();
        $hotDsj    = $recommendList->getHotPlayDsj();
        $hotMovie  = $recommendList->getHotPlayMovie();
        $hotJlp    = $recommendList->getHotPlayJlp();
        $hotDm     = $recommendList->getHotPlayDm();
        $goodTy    = $recommendList->getOneGoodTy();
        $goodZy    = $recommendList->getOneGoodZy();
        return $this->render('index/index.html.twig', [
            'topicList' => $topicList,
            'hotPlay'   => $hotPlay,
            'dsj'       => $dsj,
            'movie'     => $movie,
            'zy'        => $zy,
            'dm'        => $dm,
            'jlp'       => $jlp,
            'sport'     => $sport,
            'hotDsj'    => $hotDsj,
            'hotDm'     => $hotDm,
            'hotJlp'    => $hotJlp,
            'hotMovie'  => $hotMovie,
            'goodTy'    => $goodTy,
            'goodZy'    => $goodZy,
        ]);
    }
}
