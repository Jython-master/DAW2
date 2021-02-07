<?php
require_once 'PDOconnect.php';
require_once "generos.php";
class genredb{
    public function insert($name){
        $connection = new Connection();
        $add = $connection->connect()->prepare("INSERT INTO generos(nome) VALUES (:name)");
        $add->bindValue(":name", $name);
        $add->execute();
    }
    public function select(){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM generos");
        $add->execute();
        $genres = array();
        foreach($add as $genre){
            $var = new genre();
            $var->setId($genre["id"]);
            $var->setName($genre["nome"]);
            $genres[] = $var;
        }
        return $genres;
    }
    public function update($name, $var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE generos SET nome = :name WHERE id = :var");
        $add->bindValue(":name", $name);
        $add->bindValue(":var", $var);
        $add->execute();
    }
    public function delete($var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("DELETE FROM generos WHERE id = :var");
        $add->bindValue(":var", $var);
        $add->execute();
    }
    public function selectOne($id){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM generos WHERE id = :id");
        $add->bindValue(":id", $id);
        $add->execute();
        foreach($add as $genre){
            return $genre["nome"];
        }
    }
}