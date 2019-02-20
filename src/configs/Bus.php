<?php

class Bus extends Resources
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getBus() {
        try {
            $sql='SELECT * FROM `bus`;';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            try {
                $sql='INSERT INTO `bus` (`model`,`plate`,`capacity`,`status`) VALUES (:model,:plate,:capacity,:status);';

                $db=$this->db->prepare($sql);
                $db->bindValue(':model', $_POST['model'],PDO::PARAM_STR);
                $db->bindValue(':plate', $_POST['plate'],PDO::PARAM_STR);
                $db->bindValue(':capacity', $_POST['capacity'],PDO::PARAM_STR);
                $db->bindValue(':status', $_POST['status'],PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}