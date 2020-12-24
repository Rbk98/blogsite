<?php

namespace App\src\model;

require_once('vendor\autoload.php');

class Post
{

    private $idpost;
    private $id_client;
    private $content;
    private $title;
    private $created_at;
    private $updated_at;
    private $deleted_at;

    public function getId()
    {
        return $this->idpost;
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

    public function setId($idpost)
    {
        $this->idpost = $idpost;
        return $this;
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

    public function setUpdateAt($updated_at)
    {
        $this->updated_at= $updated_at;
        return $this;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at= $deleted_at;
        return $this;
    }
}