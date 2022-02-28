<?php

namespace App\Controller;

use App\DocumentRepository\IndexListRepository;
use App\DocumentRepository\TopicRepository;
use App\DocumentRepository\VodListRepository;
use App\Message\UserClick;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

use Mobile_Detect;

class IndexController extends AbstractController
{
    #[Route('/index.html', name: 'index', options: ['sitemap' => true])]
    public function index(VodListRepository $vodListRepository, RecommendList $recommendList, Mobile_Detect $mobile_Detect): Response
    {
        $topicList = $recommendList->getTopic();
        $hotPlay   = $recommendList->getHotPlay();
        $dsj       = $recommendList->getHotDsj();
        $movie     = $recommendList->getHotMovie();
        $zy        = $recommendList->getHotZy();
        $dm        = $recommendList->getHotDm();
        $jlp       = $recommendList->getHotJlp();
        $llp       = $recommendList->getLlp();
        $sport     = $recommendList->getHotSport();
        $hotDsj    = $recommendList->getHotPlayDsj();
        $hotMovie  = $recommendList->getHotPlayMovie();
        $hotJlp    = $recommendList->getHotPlayJlp();
        $hotDm     = $recommendList->getHotPlayDm();
        $goodTy    = $recommendList->getOneGoodTy();
        $goodZy    = $recommendList->getOneGoodZy();


        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/index/index.html.twig';
        } else {
            $tmp = 'index/index.html.twig';
        }

        return $this->render($tmp, [
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
            'llp'       => $llp,
            'goodTy'    => $goodTy,
            'goodZy'    => $goodZy,
        ]);
    }
}
