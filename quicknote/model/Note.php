<?php

namespace quicknote\model;

use quicknote\interfaces\ISendAble;

class Note implements ISendAble
{
    private $id;
    private $author;
    private $recipient;
    private $content;

    public function __construct(string $id,string $author, string $recipient, string $content)
    {
        $this->id = id;
        $this->author = $author;
        $this->recipient = $recipient;
        $this->content = $content;
    }

    public function send()
    {
        // TODO: Implement send() method.
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }


}