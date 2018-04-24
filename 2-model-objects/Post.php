<?php

class Post
{
    private $id       = 0;
    private $title    = null;
    private $body     = null;
    private $comments = [];

    public static function make(stdClass $data)
    {
        $instance = new self();

        $instance->setId($data->id);
        $instance->setTitle($data->title);
        $instance->setBody($data->body);

        return $instance;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param null $body
     *
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param \Comment $comment
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }
}