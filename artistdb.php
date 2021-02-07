<?php
require_once 'PDOconnect.php';
require_once "artista.php";
class Artistdb{
    public function insert($yearFormation, $profilepic, $password, $email, $name, $descrip, $coverphoto, $country){
        $connection = new Connection();
        $add = $connection->connect()->prepare("INSERT INTO artista (anoFormacao, fotoPerfil, senha, email, Nome, Descricao, foto_capa, pais) VALUES (:yearf, :propic, :pass, :email, :name, :des, :cp, :coun)");
        $add->bindValue(":yearf",$yearFormation);
        echo $yearFormation."<br/>";
        $add->bindValue(":propic",$profilepic);
        echo $profilepic."<br/>";
        $add->bindValue(":pass",$password);
        echo $password."<br/>";
        $add->bindValue(":email",$email);
        $add->bindValue(":name",$name);
        $add->bindValue(":des",$descrip);
        $add->bindValue(":cp",$coverphoto);
        $add->bindValue(":coun",$country);
        $add->execute();
    }
    public function select(){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM artista");
        $select->execute();
        $artists = array();
        foreach($select as $artist){
            $var = new artist();
            $var->setId($artist["ID"]);
            $var->setForyear($artist["anoFormacao"]);
            $var->setPass($artist["senha"]);
            $var->setEmail($artist["email"]);
            $var->setName($artist["Nome"]);
            $var->setDesc($artist["Descricao"]);
            $var->setCountry($artist["pais"]);
                        $var->setProfpic($artist["fotoPerfil"]);
                        $var->setCover($artist["foto_capa"]);
            
            $artists[] = $var;
        }
        return $artists;
    }
    public function selectname($var){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT Nome FROM artista WHERE ID = :var");
        $select->bindValue(":var", $var);
        $select->execute();
        foreach($select as $artist){
            return $artist["Nome"];
        }
        
    }
        public function selectOne($id){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM artista WHERE ID = :id");
        $select->bindValue(":id", $id);
        $select->execute();
        $artists = array();
        foreach($select as $artist){
            $var = new artist();
            $var->setId($artist["ID"]);
            $var->setForyear($artist["anoFormacao"]);
            $var->setProfpic($artist["fotoPerfil"]);
            $var->setPass($artist["senha"]);
            $var->setEmail($artist["email"]);
            $var->setName($artist["Nome"]);
            $var->setDesc($artist["Descricao"]);
            $var->setCover($artist["foto_capa"]);
            $var->setCountry($artist["pais"]);
            $artists[] = $var;
        }
        return $artists;
    }
    public function update($yearFormation, $password, $email, $name, $descrip, $country, $var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE artista SET anoFormacao = :yearf, senha = :pass, email = :email, Nome = :name, Descricao = :des, pais = :coun WHERE ID = :var");
        $add->bindValue(":yearf",$yearFormation);
        $add->bindValue(":pass",$password);
        $add->bindValue(":email",$email);
        $add->bindValue(":name",$name);
        $add->bindValue(":des",$descrip);
        $add->bindValue(":coun",$country);
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function delete($var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("DELETE FROM artista WHERE ID = :var");
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function updatePic($profilepic, $coverphoto, $id){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE artista SET fotoPerfil = :propic, foto_capa = :cp WHERE ID = :var");
        $add->bindValue(":propic",$profilepic);
        $add->bindValue(":cp",$coverphoto);
        $add->bindValue(":var",$id);
        $add->execute();
    }
    public function selectArtist($nome = ""){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM artista WHERE Nome LIKE :nome");
        $nome = "%".$nome."%";
        $select->bindValue(":nome", $nome);
        $select->execute();
        $artists = array();
        foreach($select as $artist){
            $var = new artist();
            $var->setId($artist["ID"]);
            $var->setForyear($artist["anoFormacao"]);
            $var->setProfpic($artist["fotoPerfil"]);
            $var->setPass($artist["senha"]);
            $var->setEmail($artist["email"]);
            $var->setName($artist["Nome"]);
            $var->setDesc($artist["Descricao"]);
            $var->setCover($artist["foto_capa"]);
            $var->setCountry($artist["pais"]);
            $artists[] = $var;
        }
        return $artists;
    }
    public function login($em, $pass){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT ID, senha FROM artista WHERE email = :email");
        $add->bindValue(":email", $em);
        $add->execute();
        $users = array();
        foreach($add as $user){
            echo "a";
            if($pass === $user["senha"]){
                echo "login";
                return $user["ID"];
            }
            else{
                echo "not";
                return 0;
            }
        }
        return 0;
        
    }
}
?>