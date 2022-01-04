<?php
// src/Document/Product.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Lists
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $url;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $cid;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $r_id;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $title;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $alias;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $long_title;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $pic;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $imgUrl;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $Director;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $Stars;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $DownStatus;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $Introduction;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $LastUpdated;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $UpdatedDate;
    /**
     * @MongoDB\Field(type="float")
     */
    protected $Source;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $UpdatedTime;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $updatedTime;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $CreatedTime;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $productionDate;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $PageDate;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $Rating;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $DoubanUrl;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $DoubanId;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $Tags;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $Type;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $Year;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $Area;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $RunTime;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $Language;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $DownUrl;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $Status;



    /**
     * @MongoDB\Field(type="string")
     */
    protected $ProductionCompany;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $status;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $ClickCount;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $DownCount;
}