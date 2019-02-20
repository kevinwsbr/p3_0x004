<?php

class Stadium extends Resources
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getStadiums() {
        try {
            $sql='SELECT * FROM `stadiums`;';

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
                $sql='INSERT INTO `stadiums` (`name`,`address`,`capacity`,`restrooms`,`snack_bars`,`status`) VALUES (:name,:address,:capacity,:restrooms, :snack_bars, :status);';

                $db=$this->db->prepare($sql);
                $db->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
                $db->bindValue(':address', $_POST['address'],PDO::PARAM_STR);
                $db->bindValue(':capacity', $_POST['capacity'],PDO::PARAM_STR);
                $db->bindValue(':restrooms', $_POST['restrooms'],PDO::PARAM_STR);
                $db->bindValue(':snack_bars', $_POST['snack_bars'],PDO::PARAM_STR);
                $db->bindValue(':status', $_POST['status'],PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}