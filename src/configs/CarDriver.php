<?php

class CarDriver extends Employee
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            try {
                $sql='INSERT INTO `employees` (`name`,`email`,`CPF`,`salary`,`phone`,`driving_ID`,`role`) VALUES (:name,:email,:CPF,:salary, :phone, :driving_ID, :role);';

                $db=$this->db->prepare($sql);
                $db->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
                $db->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
                $db->bindValue(':CPF', $_POST['CPF'],PDO::PARAM_STR);
                $db->bindValue(':salary', $_POST['salary'],PDO::PARAM_STR);
                $db->bindValue(':phone', $_POST['phone'],PDO::PARAM_STR);
                $db->bindValue(':driving_ID', $_POST['driving_ID'],PDO::PARAM_STR);
                $db->bindValue(':role', "DOCTOR",PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}