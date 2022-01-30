<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VodDetailController extends AbstractController
{
    #[Route('/vod/detail/{id}.html', name: 'vod_detail', methods: ['GET'])]
    public function index(ListsRepository $listsRepository, Request $request, RecommendList $recommendList): Response
    {
        $id   = $request->get('id');
        $res  = $listsRepository->find($id);
        $type = $res->getType()[0];

        $rute = [
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
        return $this->render('vod_detail/index.html.twig', [
            'res'   => $res,
            'today' => $recommendList->getToday(),
            'topic' => $recommendList->getTopic(),
            'like'  => $recommendList->getList(),
            'nav'   => $this->generateUrl($rute[$type]),
        ]);
    }
}
