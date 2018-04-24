<?php

class Comment
{
    private $id;
    private $postId;
    private $body;

    public static function make(stdClass $data)
    {
        $instance = new self();

        $instance->setId($data->id);
        $instance->setPostId($data->postId);
        $instance->setBody($data->body);

        return $instance;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }


}