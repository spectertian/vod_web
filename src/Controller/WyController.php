<?php

namespace App\Controller;

use App\Service\TypeRecommendList;
use App\Service\WyRecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;
use Mobile_Detect;

class WyController extends AbstractController
{
    #[Route('/wy.html', name: 'wy', options: ['sitemap' => true])]
    public function index(WyRecommendList $wyRecommendList, Mobile_Detect $mobile_Detect): Response
    {
        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/wy/index.html.twig';
            $num = 6;
        } else {
            $tmp = 'wy/index.html.twig';
            $num = 16;
        }
        return $this->render($tmp,
            [
                'hotList'   => $wyRecommendList->getDyByHot($num),
                'gcjpList'  => $wyRecommendList->getDyByTypeName("国产精品", $num),
                'zzzzList'  => $wyRecommendList->getDyByTypeName("主播直播", $num),
                'rbwmList'  => $wyRecommendList->getDyByTypeName("日本无码", $num),
                'rbyymList' => $wyRecommendList->getDyByTypeName("日本有码", $num),
                'omjpList'  => $wyRecommendList->getDyByTypeName("欧美极品", $num),
                'zwzmList'  => $wyRecommendList->getDyByTypeName("中文字幕", $num),
                'qjllList'  => $wyRecommendList->getDyByTypeName("强奸乱伦", $num),
                'zfyhList'  => $wyRecommendList->getDyByTypeName("制服诱惑", $num),
                'jrmrList'  => $wyRecommendList->getDyByTypeName("巨乳美乳", $num),
                'snllList'  => $wyRecommendList->getDyByTypeName("少女萝莉", $num),
                'btllList'  => $wyRecommendList->getDyByTypeName("变态另类", $num),
                'sjllList'  => $wyRecommendList->getDyByTypeName("三级乱伦", $num),
                'crdmList'  => $wyRecommendList->getDyByTypeName("成人动漫", $num),
                'rhzhList'  => $wyRecommendList->getDyByTypeName("日韩综合", $num),
                'zptpList'  => $wyRecommendList->getDyByTypeName("自拍偷拍", $num),
                'sbrqList'  => $wyRecommendList->getDyByTypeName("熟女人妻", $num),
                'hwmxList'  => $wyRecommendList->getDyByTypeName("海外明星", $num),
                'list'      => [
                    'gcjpList'  => $wyRecommendList->getDyByTypeName("国产精品", $num),
                    'zzzzList'  => $wyRecommendList->getDyByTypeName("主播直播", $num),
                    'rbwmList'  => $wyRecommendList->getDyByTypeName("日本无码", $num),
                    'rbyymList' => $wyRecommendList->getDyByTypeName("日本有码", $num),
                    'omjpList'  => $wyRecommendList->getDyByTypeName("欧美极品", $num),
                    'zwzmList'  => $wyRecommendList->getDyByTypeName("中文字幕", $num),
                    'qjllList'  => $wyRecommendList->getDyByTypeName("强奸乱伦", $num),
                    'zfyhList'  => $wyRecommendList->getDyByTypeName("制服诱惑", $num),
                    'jrmrList'  => $wyRecommendList->getDyByTypeName("巨乳美乳", $num),
                    'snllList'  => $wyRecommendList->getDyByTypeName("少女萝莉", $num),
                    'btllList'  => $wyRecommendList->getDyByTypeName("变态另类", $num),
                    'sjllList'  => $wyRecommendList->getDyByTypeName("三级乱伦", $num),
                    'crdmList'  => $wyRecommendList->getDyByTypeName("成人动漫", $num),
                    'rhzhList'  => $wyRecommendList->getDyByTypeName("日韩综合", $num),
                    'zptpList'  => $wyRecommendList->getDyByTypeName("自拍偷拍", $num),
                    'sbrqList'  => $wyRecommendList->getDyByTypeName("熟女人妻", $num),
                    'hwmxList'  => $wyRecommendList->getDyByTypeName("海外明星", $num),
                ],
                'nameList'      => [
                    'gcjpList'  => '国产精品',
                    'zzzzList'  => '主播直播',
                    'rbwmList'  => '主播直播',
                    'rbyymList' => '日本有码',
                    'omjpList'  => '欧美极品',
                    'zwzmList'  => '中文字幕',
                    'qjllList'  => '强奸乱伦',
                    'zfyhList'  => '制服诱惑',
                    'jrmrList'  => '巨乳美乳',
                    'snllList'  => '少女萝莉',
                    'btllList'  => '变态另类',
                    'sjllList'  => '三级乱伦',
                    'crdmList'  => '成人动漫',
                    'rhzhList'  => '日韩综合',
                    'zptpList'  => '自拍偷拍',
                    'sbrqList'  => '熟女人妻',
                    'hwmxList'  => '海外明星',

                ],
                'type'      => 1,
                'typeList'  => Yaml::parseFile(dirname(__DIR__) . '/../config/web_tag.yaml')
            ]);
    }
}
