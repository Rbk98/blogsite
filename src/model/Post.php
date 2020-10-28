<?php

namespace App\src\model;

require_once('vendor\autoload.php');

class Post
{

    private $id;
    private $id_client;
    private $content;
    private $title;
    private $created_at;
    private $updated_at;
    private $deleted_at;

    public function getId()
    {
        return $this->id;
    }

    public function getIdClient()
    {
        return (int)$this->id_client;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    public function setId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
        return $this;
    }
}