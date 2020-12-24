<?php 
namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Commentaire;

class CommentRepository
{
    public function getComments(int $idpost)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->query("SELECT comment.id, comment.id_client, comment.content, client.username FROM comment, client WHERE comment.id_client=client.id AND comment.idpost= :idpost AND comment.deleted_at IS NULL ORDER BY comment.id DESC");
        $result->bindValue(':idpost', $idpost, \PDO::PARAM_INT);


        return $result->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    public function createComments(Commentaire $comment)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO `comment` (`id_client`, `idpost`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES (:id_client, :idpost, :content, :created_at, :updated_at, :deleted_at)');
        $result->bindValue(':id_client', $comment->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':idpost', $comment->getIdPost(), \PDO::PARAM_INT);
        $result->bindValue(':content', $comment->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':created_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', NULL);
        $result->bindValue(':deleted_at', NULL);
        $result->execute();
    }

    public function updateComments(Commentaire $comment)
    {
        $database = new Database;
        $db = $database->checkConnection(); 
        $result = $db->prepare('UPDATE comment SET content = :content, updated_at = :updated_at WHERE id = :id');
        $result->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
        $result->bindValue(':content', $comment->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();
    }

    public function deleteComments(Commentaire $comment)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE comment SET deleted_at = :deleted_at WHERE id = :id');
        $result->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
        $result->bindValue(':deleted_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();
    }
}

//CRUD

?>