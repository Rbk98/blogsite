<?php

namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Post;

class PostRepository
{

    public function getOnePost($idpost)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare("SELECT * FROM `post` WHERE idpost=:idpost");
        $result->bindValue(':idpost', $idpost, \PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    public function getPosts()
    {
        $database = new Database;

        $db = $database->checkConnection();
        $result = $db->query("SELECT post.idpost, post.id_client, post.content, post.title, client.username, post.created_at FROM post, client WHERE post.id_client=client.id  AND post.deleted_at IS NULL ORDER BY post.idpost DESC");
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertPost(Post $post)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO `post` (id_client, content, title, created_at, updated_at, deleted_at) VALUES (:id_client, :content, :title, :created_at, :updated_at, :deleted_at)');
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
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE `post` SET `id_client`=:id_client, `content`=:content, `title`=:title, `updated_at`=:updated_at WHERE idpost=:idpost');
        $result->bindValue(':idpost', $post->getId(), \PDO::PARAM_INT);
        $result->bindValue(':id_client', $post->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();

        header('Location: ?page=post&action=read&idpost=' . $_GET['idpost']);

    }

    public function deletePost(Post $post)
    {

        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE `post` SET `id_client`=:id_client, `content`=:content, `title`=:title, `deleted_at`=:deleted_at WHERE `idpost`=:idpost');
        $result->bindValue(':idpost', $post->getId(), \PDO::PARAM_INT);
        $result->bindValue(':id_client', $post->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $result->bindValue(':deleted_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();

        header('Location: ?page=post&action=liste');

    }
}