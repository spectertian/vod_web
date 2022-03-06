<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\DocumentRepository\VodWyListRepository;
use App\Service\RecommendList;
use App\Service\WyRecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Mobile_Detect;

class PlayController extends AbstractController
{
    #[Route('/play/{s_id}/{p_id}', name: 'play')]
    public function index(VodListRepository $vodListRepository, RecommendList $recommendList, Mobile_Detect $mobile_Detect, $s_id, $p_id): Response
    {
        $info     = $vodListRepository->find($s_id);
        $play_url = $info->getPlay()[1]['list'][$p_id]['url'];
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/play/index.html.twig';
        } else {
            $tmp = 'play/index.html.twig';
        }
        return $this->render($tmp, [
            'info'           => $info,
            'recommend_list' => $recommendList->getHotByTypeId($info->getTypeId()),
            'topic'          => $recommendList->getHotByTypeName($info->getType()),
            'p_id'           => $p_id,
            'play_url'       => $play_url,
        ]);
    }


    #[Route('/play/sq/{s_id}/{p_id}', name: 'play_sq')]
    public function sq(VodWyListRepository $vodWyListRepository, WyRecommendList $wyRecommendList, Mobile_Detect $mobile_Detect, $s_id, $p_id): Response
    {
        $info = $vodWyListRepository->find($s_id);
        dump($info);
        $play_url = $info->getPlay()[0]['list'][$p_id]['url'];
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/play/index.sq.html.twig';
        } else {
            $tmp = 'play/index.sq.html.twig';
        }
        return $this->render($tmp, [
            'info'           => $info,
            'recommend_list' => $wyRecommendList->getHotByTypeId(),
            'topic'          => $wyRecommendList->getHotByTypeName($info->getType()),
            'p_id'           => $p_id,
            'play_url'       => $play_url,
        ]);
    }
}
