<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use MongoDB\BSON\UTCDateTimeInterface;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use App\Validator\Message as MessageVail;


/**
 * @MongoDB\Document(collection="message")
 */
class Message
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string",name="ip")
     */
    protected $ip;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $question;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $replay;

    /**
     * @MongoDB\Field(type="date",name="question_time")
     */
    protected $questionTime;

    /**
     * @MongoDB\Field(type="date",name="replay_time")
     */
    protected $replayTime;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('question', new MessageVail());
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;
        return $this;
    }


    public function getQuestionTime(): ?\MongoDB\BSON\UTCDateTime
    {
        return $this->questionTime;
    }

    public function setQuestionTime(\MongoDB\BSON\UTCDateTime $questionTime): self
    {
        $this->questionTime = $questionTime;
        return $this;
    }


    public function getReplay(): ?string
    {
        return $this->replay;
    }

    public function setReplay(string $replay): self
    {
        $this->replay = $replay;
        return $this;
    }

    public function getReplayTime(): ?\MongoDB\BSON\UTCDateTime
    {
        return $this->replayTime;
    }

    public function setReplayTime(\MongoDB\BSON\UTCDateTime $replayTime): self
    {
        $this->replayTime = $replayTime;
        return $this;
    }

}