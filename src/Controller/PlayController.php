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
        $info     = $vodListRepository->find($s_id);
        $play_url = $info->getPlay()[1]['list'][$p_id]['url'];
        return $this->render('play/index.html.twig', [
            'info'           => $info,
            'recommend_list' => $recommendList->getHotByTypeId($info->getTypeId()),
            'topic'          => $recommendList->getHotByTypeName($info->getType()),
            'p_id'           => $p_id,
            'play_url'       => $play_url,
        ]);
    }
}
