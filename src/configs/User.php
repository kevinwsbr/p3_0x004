<?php

class User {
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $user = $_POST['username'];
            $pwd = $_POST['password'];

            if ($user === 'admin' && $pwd === 'admin') {
                $_SESSION["user"] = $user;
            }
        }
        if (!empty($_SESSION["user"])) {
            if (empty($_SESSION["url"])) {
                header('Location: index.php');
            } else {
                header('Location: '.$_SESSION["url"]);
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
}