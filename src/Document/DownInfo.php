<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="down_info")
 */
class DownInfo
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


    public function getId(): ?float
    {
        return $this->id;
    }

    public function getCId(): ?string
    {
        return $this->cId;
    }

    public function setCId(string $cId): self
    {
        $this->cId = $cId;
        return $this;
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

    public function getType(): ?string
    {
        return $this->type[0];
    }



}