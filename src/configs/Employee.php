<?php

class Employee {

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getEmployees() {
        try {
            $sql='SELECT * FROM `employees` ORDER BY `name` ASC;';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getAnotherEmployees() {
        try {
            $sql='SELECT * FROM `employees` WHERE `role` != "PLAYER" AND WHERE `role` != "COACH" ORDER BY `name` ASC;';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getCoaches() {
        try {
            $sql='SELECT * FROM `employees` WHERE `role` = "COACH";';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function getPlayers() {
        try {
            $sql='SELECT * FROM `employees` WHERE `role` = "PLAYER";';

            $db=$this->db->prepare($sql);

            $db->execute();

            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
        }

    }

    public function register($role)
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            try {
                $sql='INSERT INTO `employees` (`name`,`email`,`CPF`,`salary`,`phone`, `role`) VALUES (:name,:email,:CPF,:salary, :phone, :role);';

                $db=$this->db->prepare($sql);
                $db->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
                $db->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
                $db->bindValue(':CPF', $_POST['CPF'],PDO::PARAM_STR);
                $db->bindValue(':salary', $_POST['salary'],PDO::PARAM_STR);
                $db->bindValue(':phone', $_POST['phone'],PDO::PARAM_STR);
                $db->bindValue(':role', $role,PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}