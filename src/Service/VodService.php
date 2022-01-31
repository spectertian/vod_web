<?php

namespace App\Service;

use App\DocumentRepository\IndexListRepository;
use App\DocumentRepository\TopicRepository;
use App\DocumentRepository\VodListRepository;

class VodService
{
    private $vodListRepository;

    public function __construct(VodListRepository $vodListRepository)
    {
        $this->vodListRepository = $vodListRepository;
    }

    public function getListByDoubanId(string $douban_id)
    {
        if (empty($douban_id)) {
            return [];
        }
        $res = $this->vodListRepository->findOneBy(["douban_id" => $douban_id]);
        if ($res) {
            return $res;
        } else {
            return [];
        }
    }
}