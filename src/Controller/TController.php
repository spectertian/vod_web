<?php

namespace App\Controller;

use App\Service\TypeRecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;
use Mobile_Detect;

class TController extends AbstractController
{
    #[Route('/t_dy.html', name: 'dy', options: ['sitemap' => true])]
    public function dy(TypeRecommendList $typeRecommendList, Mobile_Detect $mobile_Detect): Response
    {
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/t/index.dy.html.twig';
            $num = 6;
        } else {
            $tmp = 't/index.dy.html.twig';
            $num = 16;
        }
        return $this->render($tmp, [
            'topicList' => $typeRecommendList->getTopicByDy(),
            'hotList'   => $typeRecommendList->getDyByHot($num),
            'dzList'    => $typeRecommendList->getDyByTypeName("动作片", $num),
            'xjList'    => $typeRecommendList->getDyByTypeName("喜剧片", $num),
            'aqList'    => $typeRecommendList->getDyByTypeName("爱情片", $num),
            'khList'    => $typeRecommendList->getDyByTypeName("科幻片", $num),
            'kbList'    => $typeRecommendList->getDyByTypeName("恐怖片", $num),
            'fzList'    => $typeRecommendList->getDyByTypeName("犯罪片", $num),
            'zzList'    => $typeRecommendList->getDyByTypeName("战争片", $num),
            'dhList'    => $typeRecommendList->getDyByTypeName("动画片", $num),
            'jqList'    => $typeRecommendList->getDyByTypeName("剧情片", $num),
            'xyList'    => $typeRecommendList->getDyByTypeName("悬疑片", $num),
            'qhList'    => $typeRecommendList->getDyByTypeName("奇幻片", $num),
            'type'      => 1,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }

    #[Route('/t_tv.html', name: 'tv')]
    public function tv(TypeRecommendList $typeRecommendList, Mobile_Detect $mobile_Detect): Response
    {
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/t/index.tv.html.twig';
            $num = 6;
        } else {
            $tmp = 't/index.tv.html.twig';
            $num = 16;
        }
        return $this->render($tmp, [
            'topicList' => $typeRecommendList->getTopicByTv(),
            'hotList'   => $typeRecommendList->getTvByHot($num),
            'gcList'    => $typeRecommendList->getTvByTypeName("国产剧", $num),
            'twList'    => $typeRecommendList->getTvByTypeName("台湾剧", $num),
            'xgList'    => $typeRecommendList->getTvByTypeName("香港剧", $num),
            'rbList'    => $typeRecommendList->getTvByTypeName("日本剧", $num),
            'tList'     => $typeRecommendList->getTvByTypeName("泰剧", $num),
            'hwList'    => $typeRecommendList->getTvByTypeName("海外剧", $num),
            'mgList'    => $typeRecommendList->getTvByTypeName("美国剧", $num),
            'hgList'    => $typeRecommendList->getTvByTypeName("韩国剧", $num),
            'type'      => 2,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }

    #[Route('/t_zy.html', name: 'zy')]
    public function zy(TypeRecommendList $typeRecommendList, Mobile_Detect $mobile_Detect): Response
    {
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/t/index.zy.html.twig';
            $num = 6;
        } else {
            $tmp = 't/index.zy.html.twig';
            $num = 16;
        }
        return $this->render($tmp, [
            'topicList' => $typeRecommendList->getTopicByZy(),
            'hotList'   => $typeRecommendList->getZyByHot($num),
            'dlList'    => $typeRecommendList->getZyByTypeName("大陆综艺", $num),
            'rhList'    => $typeRecommendList->getZyByTypeName("日韩综艺", $num),
            'gtList'    => $typeRecommendList->getZyByTypeName("港台综艺", $num),
            'omList'    => $typeRecommendList->getZyByTypeName("欧美综艺", $num),
            'type'      => 3,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }

    #[Route('/t_dm.html', name: 'dm')]
    public function dm(TypeRecommendList $typeRecommendList, Mobile_Detect $mobile_Detect): Response
    {
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/t/index.dm.html.twig';
            $num = 6;
        } else {
            $tmp = 't/index.dm.html.twig';
            $num = 16;
        }
        return $this->render($tmp, [
            'topicList' => $typeRecommendList->getTopicByDm(),
            'hotList'   => $typeRecommendList->getDmByHot($num),
            'gcList'    => $typeRecommendList->getDmByTypeName("国产动漫", $num),
            'rhList'    => $typeRecommendList->getDmByTypeName("日韩动漫", $num),
            'omList'    => $typeRecommendList->getDmByTypeName("欧美动漫", $num),
            'type'      => 4,
            'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
        ]);
    }
}
