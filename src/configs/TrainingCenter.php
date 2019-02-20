<?php
/**
 * Created by PhpStorm.
 * User: Kevin Washington
 * Date: 19/02/2019
 * Time: 21:23
 */

class TrainingCenter extends Resources
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getTrainingCenters() {
        try {
            $sql='SELECT * FROM `training_centers`;';

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
                $sql='INSERT INTO `training_centers` (`name`,`address`,`dormitories`,`status`) VALUES (:name,:address,:dormitories,:status);';

                $db=$this->db->prepare($sql);
                $db->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
                $db->bindValue(':address', $_POST['address'],PDO::PARAM_STR);
                $db->bindValue(':dormitories', $_POST['dormitories'],PDO::PARAM_STR);
                $db->bindValue(':status', $_POST['status'],PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}