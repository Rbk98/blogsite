<?php 

namespace App\src\controller;

use App\src\model\Post;
use App\src\repository\PostRepository;


class PostController 
{
    private $postRep;

    public function __construct()
    {
        if (!isset($this->postRep)) {
            $this->postRep = new PostRepository();
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
            $post->setId($_GET['id']);
            $post->setIdClient($_POST['id_client']);
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $this->postRep->insertPost($post);
        }

        require('templates/createPost.php');
    }

    public function read() //pour un seul article
    {
        if($_GET['id'] != null){
            $post = $this->postRep->getPosts($_GET['id']);
            require('templates/lecturepost.php');
        }
        else{
            header('Location: index.php/?page=post&action=liste');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = new Post;
            $post->setId($_GET['id']);
            $post->setIdClient($_POST['id_client']);
            $post->setContent($_POST['content']);
            $post->setTitle($_POST['title']);
            $this->postRep->updatePost($post);
        }

        if($_GET['id'] != null){
            $post = $this->postRep->getPosts($_GET['id']);
            require('templates/modifierpost.php');
        }else
            header('Location: index.php?page=post&action=liste');
    }

    public function delete()
    {
        if(isset($_GET['id'])) {
            header('Location: index.php?page=post&action=list');
        }

        $this->postRepo->deletePost($_GET['id']);

        require('templates/actualité.php');
        
    }
}

?>