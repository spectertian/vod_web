<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RankController extends AbstractController
{
    #[Route('/rank.html', name: 'rank')]
    public function index(RecommendList $recommendList): Response
    {
        $dsj   = $recommendList->getHotDsj();
        $movie = $recommendList->getHotMovie();
        $zy    = $recommendList->getHotZy();
        $dm    = $recommendList->getHotDm();
        return $this->render('rank/index.html.twig', [
            'dsj'   => $dsj,
            'movie' => $movie,
            'zy'    => $zy,
            'dm'    => $dm,
        ]);
    }
}
