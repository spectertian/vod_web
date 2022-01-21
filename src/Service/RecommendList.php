<?php

namespace App\Service;

use App\DocumentRepository\IndexListRepository;
use App\DocumentRepository\TopicRepository;

class RecommendList
{
    private $indexListRepository;
    private $topicRepository;

    public function __construct(IndexListRepository $indexListRepository, TopicRepository $topicRepository)
    {
        $this->indexListRepository = $indexListRepository;
        $this->topicRepository     = $topicRepository;
    }

    public function getList()
    {
        return $this->indexListRepository->findBy(['type' => '本周电影下载排行'], ["id" => "desc", 'sort' => 'asc'], 10);

    }

    public function getTopic()
    {
        return $this->topicRepository->findBy([], ['n_id' => 'desc'], 10);

    }

    public function getToday()
    {
        return $this->indexListRepository->findBy(['type' => 'today_recommend'], ["id" => "desc", 'sort' => 'asc'], 10);

    }
}