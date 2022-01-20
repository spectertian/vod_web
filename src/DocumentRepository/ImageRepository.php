<?php

namespace App\DocumentRepository;

use App\Document\Image;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceGridFSRepository;

/**
 * Remember to map this repository in the corresponding document's repositoryClass.
 * For more information on this see the previous chapter.
 */
class ImageRepository extends ServiceGridFSRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }
}