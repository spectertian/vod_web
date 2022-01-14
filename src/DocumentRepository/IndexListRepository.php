<?php

namespace App\DocumentRepository;

use App\Document\IndexList;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;

/**
 * Remember to map this repository in the corresponding document's repositoryClass.
 * For more information on this see the previous chapter.
 */
class IndexListRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IndexList::class);
    }
}