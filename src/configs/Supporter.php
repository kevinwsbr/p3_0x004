<?php

class Supporter {

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getSupporters() {
        try {
            $sql='SELECT * FROM `supporters` ORDER BY `name` ASC;';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getData() {
        try {
            $sql='SELECT * FROM `supporters` WHERE `ID` = :ID;';
            $db=$this->db->prepare($sql);
            $db->bindValue(':ID', $_GET['id'], PDO::PARAM_STR);

            $db->execute();

            return $db->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getSupportersCount() {
        try {
            $sql='SELECT * FROM `supporters`;';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->rowCount();
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getAdSupportersCount() {
        try {
            $sql='SELECT * FROM `supporters` WHERE `status` = "AD";';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->rowCount();
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getInadSupportersCount() {
        try {
            $sql='SELECT * FROM `supporters` WHERE `status` = "INAD";';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->rowCount();
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $sql='UPDATE `supporters` SET `category` = :category, `status` = :status WHERE `ID` = :ID;';

            $db=$this->db->prepare($sql);

            $db->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
            $db->bindValue(':status', $_POST['status'], PDO::PARAM_STR);
            $db->bindValue(':ID', $_GET['id'], PDO::PARAM_STR);

            $db->execute();
            header('Location: index.php');
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            try {
                $sql='INSERT INTO `supporters` (`name`,`CPF`,`email`, `phone`, `address`,`category`,`status`) VALUES (:name,:CPF,:email, :phone, :address, :category, :status);';

                $db=$this->db->prepare($sql);
                $db->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
                $db->bindValue(':CPF', $_POST['CPF'],PDO::PARAM_STR);
                $db->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
                $db->bindValue(':phone', $_POST['phone'],PDO::PARAM_STR);
                $db->bindValue(':address', $_POST['address'],PDO::PARAM_STR);
                $db->bindValue(':category', $_POST['category'],PDO::PARAM_STR);
                $db->bindValue(':status', $_POST['status'],PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}