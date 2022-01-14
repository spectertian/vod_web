<?php

namespace App\Controller;

use App\Document\IndexList;
use App\DocumentRepository\IndexListRepository;
use App\DocumentRepository\TopicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(IndexListRepository $indexListRepository, TopicRepository $topicRepository): Response
    {
        $hotList        = $topicRepository->findBy([], ['n_id' => 'desc'], 16);
        $todayRecommend = $indexListRepository->findBy([], ['type' => 'today_recommend'], 36);
        $newMovie       = $indexListRepository->findBy([], ['type' => '最新电影下载'], 70);
        $newTv          = $indexListRepository->findBy([], ['type' => '最新电视剧下载'], 70);
        return $this->render('index_dy/index.html.twig', [
            'hotList'        => $hotList,
            'todayRecommend' => $todayRecommend,
            'newMovie'       => $newMovie,
            'newTv'          => $newTv,
        ]);
    }
}
