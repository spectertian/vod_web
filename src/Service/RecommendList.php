<?php

namespace App\Service;

use App\DocumentRepository\IndexListRepository;

class RecommendList
{
    private $indexListRepository;

    public function __construct(IndexListRepository $indexListRepository)
    {
        $this->indexListRepository = $indexListRepository;
    }

    public function getList()
    {
        return $this->indexListRepository->findBy(['type' => '本周电影下载排行'], ["id" => "desc", 'sort' => 'asc'], 10);

    }
}