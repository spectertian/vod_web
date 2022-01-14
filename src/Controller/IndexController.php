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
        $todayRecommend = $indexListRepository->findBy(['type' => 'today_recommend'], ["id" => "desc", 'sort' => 'asc'], 36);
        $newMovie       = $indexListRepository->findBy(['type' => '最新电影下载'], ["id" => "desc", 'sort' => 'asc'], 70);
        $newTv          = $indexListRepository->findBy(['type' => '最新电视剧下载'], ["id" => "desc", 'sort' => 'asc'], 70);
        $wyp            = $indexListRepository->findBy(['type' => '外语片'], ["id" => "desc", 'sort' => 'asc'], 70);
        $gyp            = $indexListRepository->findBy(['type' => '国语片'], ["id" => "desc", 'sort' => 'asc'], 70);
        $jd             = $indexListRepository->findBy(['type' => '经典电影'], ["id" => "desc", 'sort' => 'asc'], 70);
        $dhp            = $indexListRepository->findBy(['type' => '动画片'], ["id" => "desc", 'sort' => 'asc'], 70);
        $gcj            = $indexListRepository->findBy(['type' => '国产剧'], ["id" => "desc", 'sort' => 'asc'], 70);
        $tvb            = $indexListRepository->findBy(['type' => '港台剧'], ["id" => "desc", 'sort' => 'asc'], 70);
        $rhj            = $indexListRepository->findBy(['type' => '日韩剧'], ["id" => "desc", 'sort' => 'asc'], 70);
        $om             = $indexListRepository->findBy(['type' => '欧美剧'], ["id" => "desc", 'sort' => 'asc'], 70);
        $jlp            = $indexListRepository->findBy(['type' => '纪录片'], ["id" => "desc", 'sort' => 'asc'], 70);
        $qtj            = $indexListRepository->findBy(['type' => '其它剧'], ["id" => "desc", 'sort' => 'asc'], 70);
        $bzdy           = $indexListRepository->findBy(['type' => '本周电影下载排行'], ["id" => "desc", 'sort' => 'asc'], 70);
        $bzdsj          = $indexListRepository->findBy(['type' => '本周电视剧下载排行'], ["id" => "desc", 'sort' => 'asc'], 70);
        $bydy           = $indexListRepository->findBy(['type' => '本月电影下载排行'], ["id" => "desc", 'sort' => 'asc'], 70);
        $bydjs          = $indexListRepository->findBy(['type' => '本月电视剧下载排行'], ["id" => "desc", 'sort' => 'asc'], 70);
        return $this->render('index_dy/index.html.twig', [
            'hotList'        => $hotList,
            'todayRecommend' => $todayRecommend,
            'newMovie'       => $newMovie,
            'newTv'          => $newTv,
            'wyp'            => $wyp,
            'gyp'            => $gyp,
            'jd'             => $jd,
            'dhp'            => $dhp,
            'gcj'            => $gcj,
            'tvb'            => $tvb,
            'rhj'            => $rhj,
            'om'             => $om,
            'jlp'            => $jlp,
            'qtj'            => $qtj,
            'bzdy'           => $bzdy,
            'bzdsj'          => $bzdsj,
            'bydy'           => $bydy,
            'bydsj'          => $bydjs,
        ]);
    }
}
