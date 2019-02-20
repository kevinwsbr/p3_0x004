<?php
/**
 * Created by PhpStorm.
 * User: Kevin Washington
 * Date: 19/02/2019
 * Time: 19:49
 */

class Coach extends Employee
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function registerCoach()
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
                $db->bindValue(':role', "COACH",PDO::PARAM_STR);

                $db->execute();
                header('Location: index.php');
            } catch(PDOException $e) {
                echo 'Ops, aconteceu o seguinte erro: ' . $e->getMessage();
            }

        }
    }
}