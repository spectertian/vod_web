<?php

namespace App\Service;

use App\DocumentRepository\VodWyListRepository;

class WyRecommendList
{
    private $vodWyListRepository;

    public function __construct(VodWyListRepository $vodWyListRepository)
    {
        $this->vodWyListRepository = $vodWyListRepository;
    }

    public function getTopicByDy($limit = 8)
    {
        return $this->vodWyListRepository->findBy([], ["vod_time" => 'desc'], $limit);
    }

    public function getDyByHot($limit = 16)
    {
        return $this->vodWyListRepository->findBy([], ["vod_hits" => 'desc'], $limit);
    }

    public function getDyByTypeName($type_name = "国产精品", $limit = 16)
    {
        return $this->vodWyListRepository->findBy(['type_name' => $type_name], ["vod_time_add" => 'desc'], $limit);
    }

    public function getHotByTypeName($type_name, $limit = 10)
    {
        return $this->vodWyListRepository->findBy(["type_name" => $type_name], ['vod_time' => 'desc'], $limit);
    }

    public function getHotByTypeId($limit = 12)
    {
        return $this->vodWyListRepository->findBy([], ['vod_time_add' => 'desc'], $limit);
    }

}