<?php 

namespace App\src\controller;

use App\src\model\Post;
use App\src\repository\PostRepository;
use App\src\repository\CommentRepository;
use App\src\config\Session;


class PostController 
{
    private $postRep;

    public function __construct()
    {

        if (!isset($this->session)) {            
            $this->session = new Session;
        }

        if (!isset($this->postRep)) {
            $this->postRep = new PostRepository;
        }

        if (!isset($this->commentRepository)) {
            $this->commentRepository = new CommentRepository;
        }
    }

    public function liste()
    {
        $posts = $this->postRep->getPosts();

        require('templates/actualité.php');
    }

    //CRUD
    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = new Post;
            $post->setIdClient($this->session->get('id'));
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $this->postRep->insertPost($post);
        }

        require('templates/createPost.php');
    }

    public function read() //pour un seul article
    {

        if(!isset($_GET['idpost'])){
            header('Location: ?page=post&action=liste');
        }

        $postLecture = $this->postRep->getOnePost($_GET['idpost']);
        require('templates/lecturepost.php');

    }

    public function update()
    {

        if (isset($_POST['idpost'])) {
            $post = new Post;
            $post->setId($_POST['idpost']);
            $post->setIdClient($_POST['id_client']);
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $post->setUpdateAt(date('Y-m-d H:i:s'));
            $this->postRep->updatePost($post);

        }

        $post = $this->postRep->getOnePost($_GET['idpost']);
    
        require('templates/modifierpost.php');

    }

    public function delete()
    {
    
        if (isset($_POST['idpost'])) {

            $post = new Post;
            $post->setId($_POST['idpost']);
            $post->setIdClient($_POST['id_client']);
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $post->setDeletedAt(date('Y-m-d H:i:s'));
            $this->postRep->deletePost($post);

        }

        $post = $this->postRep->getOnePost($_GET['idpost']);

        require('templates/modifierpost.php');
        
    }
}

?>