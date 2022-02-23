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

    public function getReByDy($limit = 8)
    {
        $this->vodListRepository->findBy(['type_id_1' => 1], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], $limit);
    }
}