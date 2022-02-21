<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayController extends AbstractController
{
    #[Route('/play/{s_id}/{p_id}', name: 'play')]
    public function index(VodListRepository $vodListRepository, RecommendList $recommendList, $s_id, $p_id): Response
    {
        $res      = $vodListRepository->find($s_id);
        $play_url = $res->getPlay()[1]['list'][$p_id]['url'];
        return $this->render('play/index.html.twig', [
            'res'      => $res,
            'topic'    => $recommendList->getTopic(),
            'p_id'     => $p_id,
            'play_url' => $play_url,
        ]);
    }
}
