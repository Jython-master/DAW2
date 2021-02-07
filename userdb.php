<?php
require_once 'PDOconnect.php';
require_once "usuario.php";
class userdb{
    public function insert($gender, $bd, $mail, $name, $pass, $phone){
        $connection = new Connection();
        $add = $connection->connect()->prepare("INSERT INTO usuario (sexo, datadenascimento, email, nome, senha, phone) VALUES (:gender, :bd, :mail, :name, :pass, :phone)");
        $add->bindValue(":gender",$gender);
        $add->bindValue(":bd",$bd);
        $add->bindValue(":mail",$mail);
        $add->bindValue(":name",$name);
        $add->bindValue(":pass",$pass);
        $add->bindValue(":phone",$phone);
        $add->execute();
    }
    public function select(){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM usuario");
        $add->execute();
        $users = array();
        foreach($add as $user){
            $var = new user();
            $var->setId($user["id"]);
            $var->setGender($user["sexo"]);
            $var->setBd($user["datadenascimento"]);
            $var->setEmail($user["email"]);
            $var->setName($user["nome"]);
            $var->setPass($user["senha"]);
            $var->setPhone($user["phone"]);
            $users[] = $var;
        }
        return $users;
    }
    public function selectOne($id){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM usuario WHERE id = :id");
        $add->bindValue(":id",$id);
        $add->execute();
        $users = array();
        foreach($add as $user){
            $var = new user();
            $var->setId($user["id"]);
            $var->setGender($user["sexo"]);
            $var->setBd($user["datadenascimento"]);
            $var->setEmail($user["email"]);
            $var->setName($user["nome"]);
            $var->setPass($user["senha"]);
            $var->setPhone($user["phone"]);
            $users[] = $var;
        }
        return $users;
    }
    public function update($gender, $bd, $mail, $name, $pass, $phone, $var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE usuario SET sexo = :gender, datadenascimento = :bd, email = :mail, nome = :name, senha = :pass, phone = :phone WHERE id = :var");
        $add->bindValue(":gender",$gender);
        $add->bindValue(":bd",$bd);
        $add->bindValue(":mail",$mail);
        $add->bindValue(":name",$name);
        $add->bindValue(":pass",$pass);
        $add->bindValue(":var",$var);
        $add->bindValue(":phone",$phone);
        $add->execute();
    }
    public function delete($var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("DELETE FROM usuario WHERE id = :var");
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function login($em, $pass){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT id, senha FROM usuario WHERE email = :email");
        $add->bindValue(":email",$em);
        $add->execute();
        $users = array();
        foreach($add as $user){
            if($pass === $user["senha"])
                return $user["id"];
            else
                return 0;
        }
        return 0;
        
    }
}