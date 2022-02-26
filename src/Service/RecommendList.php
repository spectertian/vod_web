<?php

namespace App\Service;

use App\DocumentRepository\VodListRepository;

class RecommendList
{
    private $vodListRepository;

    public function __construct(VodListRepository $vodListRepository)
    {
        $this->vodListRepository = $vodListRepository;
    }

    public function getTopic($limit = 9)
    {
        return $this->vodListRepository->findBy([], ['vod_time' => 'desc'], $limit);
    }

    public function getHotPlay($limit = 16)
    {
        return $this->vodListRepository->findBy([], ['vod_time' => 'desc'], $limit);
    }

    public function getHotDsj($limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 2], ['vod_time' => 'desc'], $limit);
    }

    public function getHotMovie($limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 1], ['vod_time' => 'desc'], $limit);
    }

    public function getHotPlayDsj($limit = 8)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 2], ['vod_time' => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getHotPlayMovie($limit = 8)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 1], ['vod_time' => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getLlp($limit = 16)
    {
        return $this->vodListRepository->findBy(["type_id" => 20], ['vod_time' => 'desc'], $limit);
    }

    public function getHotPlayDm($limit = 8)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 4], ['vod_time' => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getHotPlayJlp($limit = 8)
    {
        return $this->vodListRepository->findBy(["type_id" => 21], ['vod_time' => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }

    public function getHotZy($limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 3], ['vod_time' => 'desc'], $limit);
    }

    public function getHotDm($limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 4], ['vod_time' => 'desc'], $limit);
    }

    public function getHotJlp($limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id" => 21], ['vod_time' => 'desc'], $limit);
    }

    public function getHotSport($limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id_1" => 38], ['vod_time' => 'desc'], $limit);
    }

    public function getHotByTypeName($type_name, $limit = 10)
    {
        return $this->vodListRepository->findBy(["type_name" => $type_name], ['vod_time' => 'desc'], $limit);
    }

    public function getHotByTypeId($type_id, $limit = 12)
    {
        return $this->vodListRepository->findBy(["type_id" => $type_id], ['vod_time_add' => 'desc'], $limit);
    }

    public function getOneGoodZy()
    {
        return $this->vodListRepository->findOneBy(['vod_id' => 27791]);
    }

    public function getOneGoodTy()
    {
        return $this->vodListRepository->findOneBy(['vod_id' => 28533]);
    }
}