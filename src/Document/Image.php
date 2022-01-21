<?php


namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations\File;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Id;

/**
 * @File(bucketName="fs",db="image")
 */
class Image
{
    /** @Id */
    private $id;

    /** @File\Filename */
    private $name;
    /** @File\UploadDate */
    private $uploadDate;

    /** @File\Length */
    private $length;

    /** @File\ChunkSize */
    private $chunkSize;

    /** @File\Metadata(targetDocument=ImageMetadata::class) */
    private $metadata;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getChunkSize(): ?int
    {
        return $this->chunkSize;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function getUploadDate(): \DateTimeInterface
    {
        return $this->uploadDate;
    }

    public function getMetadata(): ?ImageMetadata
    {
        return $this->metadata;
    }
}