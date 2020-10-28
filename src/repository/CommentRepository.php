<?php 
namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Commentaire;

class CommentRepository
{
    public function getComments(Commentaire $id_post)
    {
        $database = new Database();
        $connection = $database->checkConnection();
        $result = $connection->query('SELECT * FROM comment WHERE id_post = :id_post');

        return $result->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    public function createComments(Commentaire $comment)
    {
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO comment (id_client, id_post, content, created_at) VALUES (:id_client, :id_post; :content, :created_at)');
        $result->bindValue(':idClient', $comment->getIdClient(), \PDO::PARAM_INT);
        $result->bindValue(':idPost', $comment->getIdPost(), \PDO::PARAM_INT);
        $result->bindValue(':content', $comment->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':createdAt', $comment->getCreatedAt(), \PDO::PARAM_STR);
        $result->execute();
    }

    public function updateComments(Commentaire $comment)
    {
        $database = new Database();
        $db = $database->checkConnection(); 
        $result = $db->prepare('UPDATE comment SET content = :content, updated_at = :update_at WHERE id = :id');
        $result->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
        $result->bindValue(':content', $comment->getContent(), \PDO::PARAM_STR);
        $result->bindValue(':updated_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();
    }

    public function deleteComments(Commentaire $comment)
    {
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('UPDATE comment SET deleted_at = :deleted_at WHERE id = :id');
        $result->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
        $result->bindValue(':deleted_At', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $result->execute();
    }
}

//CRUD

?>