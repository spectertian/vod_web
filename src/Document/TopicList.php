<?php

namespace App\Document;

use App\Document\Lists;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="topic_list")
 */
class TopicList
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
    protected $pic;
    /**
     * @MongoDB\Field(type="string",name="img_url")
     */
    protected $imgUrl;
    /**
     * @MongoDB\Field(type="raw")
     */
    protected $director;
    /**
     * @MongoDB\Field(type="raw")
     */
    protected $stars;
    /**
     * @MongoDB\Field(type="string",name="info_id")
     */
    protected $infoId;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $rating;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $area;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $introduction;


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

    public function getPic(): ?string
    {
        return $this->pic;
    }

    public function getInfoId(): ?string
    {
        return $this->infoId;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function getStars(): ?array
    {
        return $this->stars;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function getDirector(): ?array
    {
        return $this->director;
    }

}