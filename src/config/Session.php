<?php
namespace App\src\config;

    class Session{
        public function set($nom, $valeur)
        {       
            $_SESSION[$nom] = $valeur;
        }

        public function get($nom)
        {
            if(isset($_SESSION[$nom])){
                return $_SESSION[$nom];
            }
            return null;
        }

        public function checkSession(){
            return (isset($_SESSION['id']));
        }

        public function showFlashMessage($nom)
        {
            if(isset($_SESSION[$nom])){
                $message = $this->get($nom);
                $this->remove($nom);
                return $message;
            }
            return null;
        }

        public function remove($nom)
        {
            unset($_SESSION[$nom]);
        }

        public function stop()
        {
            session_destroy();
        }
    }
?>