<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="index_list")
 */
class IndexList
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string",name="c_id")
     */
    protected $cId;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $date;

    /**
     * @MongoDB\Field(type="string",name="production_date")
     */
    protected $productionDate;

    /**
     * @MongoDB\Field(type="string",name="info_id")
     */
    protected $infoId;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCId(): ?string
    {
        return $this->cId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function getInfoId(): ?string
    {
        return $this->infoId;
    }

    public function getProductionDate(): ?string
    {
        return $this->productionDate;
    }
}