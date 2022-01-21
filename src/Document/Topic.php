<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="topic")
 */
class Topic
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string",name="n_id")
     */
    protected $nId;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $date;

    /**
     * @MongoDB\Field(type="string")
     */

    protected $content;

    /**
     * @MongoDB\Field(type="string",name="film_num")
     */

    protected $filmNum;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function getFilmNum(): ?string
    {
        return $this->filmNum;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }
}