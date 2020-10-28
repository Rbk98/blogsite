<?php

namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Post;

class PostRepository
{
    public function getPosts()
    {
        $database = new Database();

        $db = $database->checkConnection();
        $result = $db->query('SELECT * FROM post');
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertPost(Post $post)
    {
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO post (id_client, content, title, created_at, updated_at, deleted_at) VALUES (:id_client, :content, :title, :created_at, :updated_at, :deleted_at');
        $result->bindValue(':id_client', $post->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $result->bindValue(':created_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', NULL);
        $result->bindValue(':deleted_at', NULL);
        $result->execute();
    }

    public function updatePost(Post $post)
    {
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE post SET id_client=:id_client, content=:content, title=:title, updated_at=:update_at WHERE id=:id');
        $result->bindValue(':id_client', $post->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();


    }
}