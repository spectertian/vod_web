<?php

namespace App\Service;

use App\DocumentRepository\VodListRepository;

class TypeRecommendList
{
    private $vodListRepository;

    public function __construct(VodListRepository $vodListRepository)
    {
        $this->vodListRepository = $vodListRepository;
    }

    public function getTopicByDy($limit = 8)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 1], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getDyByHot($limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 1], ["vod_time" => 'desc'], $limit);
    }

    public function getDyByTypeName($type_name = "动作片", $limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 1, 'type_name' => $type_name], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getTopicByTv($limit = 8)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 2], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getTvByHot($limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 2], ["vod_time" => 'desc'], $limit);
    }

    public function getTvByTypeName($type_name = "国产剧", $limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 2, 'type_name' => $type_name], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getTopicByZy($limit = 8)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 3], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getZyByHot($limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 3], ["vod_time" => 'desc'], $limit);
    }

    public function getZyByTypeName($type_name = "大陆综艺", $limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 3, 'type_name' => $type_name], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getTopicByDm($limit = 8)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 4], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getDmByHot($limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 4], ["vod_time" => 'desc'], $limit);
    }

    public function getDmByTypeName($type_name = "国产动漫", $limit = 16)
    {
        return $this->vodListRepository->findBy(['type_id_1' => 4, 'type_name' => $type_name], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }
}