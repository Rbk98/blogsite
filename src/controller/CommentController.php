<?php
namespace App\src\controller;

use App\src\model\Commentaire;
use App\src\repository\CommentRepository;
use App\src\config\Session;


//CRUD
class CommentController {

    public function __construct()
    {
        if (!isset($this->session)) {            
            $this->session = new Session;
        }

        if (!isset($this->commentRepository)) {
            $this->commentRepository = new CommentRepository;
        }
    }

    public function liste()
    {
        $comments = $this->commentRepository->getComments($_POST['idpost']);
        return $comments;        
    }

    public function create()
    {    
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new Commentaire;
            $comment->setIdPost($_POST['idpost']);
            $comment->setIdClient($this->session->get('id'));
            $comment->setContent($_POST['content']);
            $this->commentRepository->createComments($comment);
        }
        header('Location: ?page=post&action=liste');
        
    
    }

    public function read()
    {   
        $commentLecture = $this->commentRepository->getComments($this->session->get('idpost'));
        return $commentLecture;

    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $comment = new Commentaire;
            $comment->setId($_POST['id_comment']);
            $comment->setContent($_POST['content']);
            $comment->setUpdatedAt(date('Y-m-d H:i:s'));
            $this->commentRepository->updateComments($comment);
        }

        header('Location: ?page=post&action=liste');
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new Commentaire;
            $comment->setId($_POST['id_comment']);
            $comment->setDeletedAt(date('Y-m-d H:i:s'));
            $this->commentRepository->deleteComments($comment);
            header('Location: ?page=post&action=liste');
        }
        
    }
}

?>
