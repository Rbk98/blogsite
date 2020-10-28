<?php 
namespace App\src\model;

use App\src\config\Database;
require_once('vendor\autoload.php');

class Commentaire{

    private $username;
    private $id;
    private $id_client;
    private $id_post;
    private $content;
    private $created_at;
    private $updated_at;
    private $deleted_at;


    public function getUsername()
    {
        return $this->username;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getIdClient()
    {
        return (int)$this->id_client;
    }

    public function getIdPost()
    {
        return (int)$this->id_post;
    }

    public function getContent()
    {
        return $this->content;
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

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
        return $this;
    }

    public function setIdPost($id_post)
    {
        $this->id_post = $id_post;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }





}

?>