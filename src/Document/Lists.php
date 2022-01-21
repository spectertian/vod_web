<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="list")
 */
class Lists
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
     * @MongoDB\Field(type="string",name="long_title")
     */
    protected $longTitle;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $url;

    /**
     * @MongoDB\Field(type="raw",name="down_url")
     */
    protected $downUrl;

    /**
     * @MongoDB\Field(type="raw")
     */
    protected $type;

    /**
     * @MongoDB\Field(type="raw",name="down_status")
     */
    protected $downStatus;

    /**
     * @MongoDB\Field(type="date",name="updated_time")
     */
    protected $updatedTime;

    /**
     * @MongoDB\Field(type="date",name="created_time")
     */
    protected $createdTime;
    /**
     * @MongoDB\Field(type="raw")
     */
    protected $alias;
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
     * @MongoDB\Field(type="string")
     */
    protected $introduction;
    /**
     * @MongoDB\Field(type="string",name="last_updated")
     */
    protected $lastUpdated;
    /**
     * @MongoDB\Field(type="string",name="updated_date")
     */
    protected $updatedDate;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $source;
    /**
     * @MongoDB\Field(type="string",name="production_date")
     */
    protected $productionDate;
    /**
     * @MongoDB\Field(type="string",name="page_date")
     */
    protected $pageDate;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $rating;

    /**
     * @MongoDB\Field(type="string",name="douban_url")
     */
    protected $doubanUrl;

    /**
     * @MongoDB\Field(type="string",name="douban_id")
     */
    protected $doubanId;

    /**
     * @MongoDB\Field(type="raw")
     */
    protected $tags;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $year;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $area;

    /**
     * @MongoDB\Field(type="string",name="run_time")
     */
    protected $runTime;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $language;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $status;

    /**
     * @MongoDB\Field(type="string",name="production_company")
     */
    protected $productionCompany;


    /**
     * @MongoDB\Field(type="int",name="click_count")
     */
    protected $clickCount;

    /**
     * @MongoDB\Field(type="int",name="down_count")
     */
    protected $downCount;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getLongTitle(): ?string
    {
        return $this->longTitle;
    }

    public function setLongTitle(string $longTitle): self
    {
        $this->longTitle = $longTitle;
        return $this;
    }

    public function getPic(): ?string
    {
        return $this->pic;
    }

    public function setPic(string $pic): self
    {
        $this->pic = $pic;
        return $this;
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

    public function getPageDate(): ?string
    {
        return $this->pageDate;
    }

    public function getProductionDate(): ?string
    {
        return $this->productionDate;
    }


    public function getDoubanId(): ?string
    {
        return $this->doubanId;
    }


    public function getDoubanUrl(): ?string
    {
        return $this->doubanUrl;
    }

    public function getAlias(): ?array
    {
        return $this->alias;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getImgUrl(): ?string
    {
        if ($this->imgUrl) {
            return $this->imgUrl;
        } else {
            return '61e936609a14522cb9682aab';
        }
    }

    public function getRunTime(): ?string
    {
        return $this->runTime;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function getDirector(): ?array
    {
        return $this->director;
    }

    public function getDownUrl(): ?array
    {
        return $this->downUrl;
    }

    public function getType(): ?array
    {
        return $this->type;
    }

    public function getUpdatedDate(): ?string
    {
        return $this->updatedDate;
    }

}