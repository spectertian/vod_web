<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use App\Service\RecommendList;
use App\Service\VodService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}.html', name: 'detail', methods: ['GET'])]
    public function index(ListsRepository $listsRepository, Request $request, RecommendList $recommendList, VodService $vodService): Response
    {
        $id   = $request->get('id');
        $res  = $listsRepository->find($id);
        $type = $res->getType()[0];

        $rute     = [
            "动作片" => 'dz',
            "科幻片" => 'kh',
            "爱情片" => 'aq',
            "喜剧片" => 'xj',
            "恐怖片" => 'kb',
            "战争片" => 'zz',
            "剧情片" => 'jq',
            "纪录片" => 'jl',
            "动画片" => 'dh',
            "电视剧" => 'dsj',
        ];
        $vod_list = $vodService->getListByDoubanId($res->getDoubanId());
//        $vod_list = $vodService->getListByDoubanId('35006328');
//        dump($vod_list);exit;
        return $this->render('detail/index.html.twig', [
            'res'      => $res,
            'today'    => $recommendList->getToday(),
            'topic'    => $recommendList->getTopic(),
            'like'     => $recommendList->getList(),
            'nav'      => $this->generateUrl($rute[$type]),
            'vod_list' => $vod_list,
        ]);
    }
}
