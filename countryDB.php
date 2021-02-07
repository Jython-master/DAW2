<?php
require_once 'PDOconnect.php';
require_once "pais.php";
class Countrydb{
    public function insert($name){
        $connection = new Connection();
        $add = $connection->connect()->prepare("INSERT INTO pais(nome) VALUES (:name)");
        $add->bindValue(":name", $name);
        $add->execute();
    }
    public function update($name, $var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE pais SET nome = :name WHERE ID = :var");
        $add->bindValue(":name", $name);
        $add->bindValue(":var", $var);
        $add->execute();
    }
    public function select(){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM pais");
        $add->execute();
        $countryy = array();
        foreach($add as $country){
            $var = new country();
            $var->setId($country["ID"]);
            $var->setName($country["nome"]);
            $countryy[] = $var;
        }
        return $countryy;
    }
    public function delete($var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("DELETE FROM pais WHERE ID = :var");
        $add->bindValue(":var", $var);
        $add->execute();
    }
}