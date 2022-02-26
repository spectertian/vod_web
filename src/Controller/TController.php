<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use App\Service\TypeRecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;


class TController extends AbstractController
{
    #[Route('/t_dy.html', name: 'dy', options: ['sitemap' => true])]
    public function dy(TypeRecommendList $typeRecommendList): Response
    {
        return $this->render('t/index.dy.html.twig', [
            'topicList' => $typeRecommendList->getTopicByDy(),
            'hotList'   => $typeRecommendList->getDyByHot(),
            'dzList'    => $typeRecommendList->getDyByTypeName("动作片"),
            'xjList'    => $typeRecommendList->getDyByTypeName("喜剧片"),
            'aqList'    => $typeRecommendList->getDyByTypeName("爱情片"),
            'khList'    => $typeRecommendList->getDyByTypeName("科幻片"),
            'kbList'    => $typeRecommendList->getDyByTypeName("恐怖片"),
            'fzList'    => $typeRecommendList->getDyByTypeName("犯罪片"),
            'zzList'    => $typeRecommendList->getDyByTypeName("战争片"),
            'dhList'    => $typeRecommendList->getDyByTypeName("动画片"),
            'jqList'    => $typeRecommendList->getDyByTypeName("剧情片"),
            'xyList'    => $typeRecommendList->getDyByTypeName("悬疑片"),
            'qhList'    => $typeRecommendList->getDyByTypeName("奇幻片"),
            'type'      => 1,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')

        ]);
    }

    #[Route('/t_tv.html', name: 'tv')]
    public function tv(TypeRecommendList $typeRecommendList): Response
    {

        return $this->render('t/index.tv.html.twig', [
            'topicList' => $typeRecommendList->getTopicByTv(),
            'hotList'   => $typeRecommendList->getTvByHot(),
            'gcList'    => $typeRecommendList->getTvByTypeName("国产剧"),
            'twList'    => $typeRecommendList->getTvByTypeName("台湾剧"),
            'xgList'    => $typeRecommendList->getTvByTypeName("香港剧"),
            'rbList'    => $typeRecommendList->getTvByTypeName("日本剧"),
            'tList'     => $typeRecommendList->getTvByTypeName("泰剧"),
            'hwList'    => $typeRecommendList->getTvByTypeName("海外剧"),
            'mgList'    => $typeRecommendList->getTvByTypeName("美国剧"),
            'hgList'    => $typeRecommendList->getTvByTypeName("韩国剧"),
            'type'      => 2,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }

    #[Route('/t_dm.html', name: 'dm')]
    public function dm(TypeRecommendList $typeRecommendList): Response
    {
        return $this->render('t/index.dm.html.twig', [
            'topicList' => $typeRecommendList->getTopicByDm(),
            'hotList'   => $typeRecommendList->getDmByHot(),
            'gcList'    => $typeRecommendList->getDmByTypeName("国产动漫"),
            'rhList'    => $typeRecommendList->getDmByTypeName("日韩动漫"),
            'omList'    => $typeRecommendList->getDmByTypeName("欧美动漫"),
            'type'      => 4,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }


    #[Route('/t_zy.html', name: 'zy')]
    public function zy(TypeRecommendList $typeRecommendList): Response
    {
        return $this->render('t/index.zy.html.twig', [
            'topicList' => $typeRecommendList->getTopicByZy(),
            'hotList'   => $typeRecommendList->getZyByHot(),
            'dlList'    => $typeRecommendList->getZyByTypeName("大陆综艺"),
            'rhList'    => $typeRecommendList->getZyByTypeName("日韩综艺"),
            'gtList'    => $typeRecommendList->getZyByTypeName("港台综艺"),
            'omList'    => $typeRecommendList->getZyByTypeName("欧美综艺"),
            'type'      => 3,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }
}
