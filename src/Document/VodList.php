<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="vod_wj_list")
 */
class VodList
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
     * @MongoDB\Field(type="string",name="vod_name")
     */
    protected $title;

    /**
     * @MongoDB\Field(type="string",name="type_name")
     */
    protected $type;

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
     * @MongoDB\Field(type="string",name="vod_blurb")
     */
    protected $introduction;

    /**
     * @MongoDB\Field(type="string",name="vod_content")
     */
    protected $blurb;

    /**
     * @MongoDB\Field(type="string",name="vod_time")
     */
    protected $updatedDate;

    /**
     * @MongoDB\Field(type="string",name="vod_time_add")
     */
    protected $productionDate;

    /**
     * @MongoDB\Field(type="string",name="vod_douban_score")
     */
    protected $rating;

    /**
     * @MongoDB\Field(type="string",name="vod_douban_id")
     */
    protected $doubanId;

    /**
     * @MongoDB\Field(type="raw")
     */
    protected $tags;

    /**
     * @MongoDB\Field(type="string",name="vod_year")
     */
    protected $year;

    /**
     * @MongoDB\Field(type="string",name="vod_area")
     */
    protected $area;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $runTime;

    /**
     * @MongoDB\Field(type="string",name="vod_lang")
     */
    protected $language;

    /**
     * @MongoDB\Field(type="int",name="vod_status")
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

    /**
     * @MongoDB\Field(type="raw")
     */
    protected $play;


    public function getPlay(): ?array
    {
        return $this->play;
    }

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
        return $this->title;
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
        return $this->doubanId;
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


    public function getType(): ?string
    {
        return $this->type;
    }

    public function getUpdatedDate(): ?string
    {
        return $this->updatedDate;
    }



    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

}