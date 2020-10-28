<?php
namespace App\src\controller;

use App\src\model\Commentaire;
use App\src\repository\CommentRepository;


//CRUD
class CommentController {
    private $postRep;

    public function __construct()
    {
        if (!isset($this->postRep)) {
            $this->postRep = new CommentRepository;
        }
    }

    public function create()
    {
        if(isset($_POST['id_client'])){
            $comment = new Commentaire;
            $comment->setIdClient($_POST['id_client']);
            $comment->setIdPost($_POST['id_post']);
            $comment->setContent($_POST['content']);
            $comment->setCreatedAt(date('Y-m-d H:i:s'));
            $this->postRep->createComments($comment);

            header('Location: index.php/?page=post&action=liste');
        }else{
            header('Location: index.php');
        }
        
    }

    public function update()
    {
        if(isset($_POST['id_client'])){
            $comment = new Commentaire;
            $comment->setId($_POST['id']);
            $comment->setIdClient($_POST['id_client']);
            $comment->setIdPost($_POST['id_post']);
            $comment->setContent($_POST['content']);
            $comment->setUpdatedAt(date('Y-m-d H:i:s')); //deux fois ?
            $this->postRep->updateComments($comment);
        
            header('Location: index.php/?page=post&action=liste');
        }
        
    }

    public function delete()
    {
        
    }
}

?>