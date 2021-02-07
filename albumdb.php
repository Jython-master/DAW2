<?php
require_once 'PDOconnect.php';
require_once "album.php";
class albumdb{
    public function insert($release, $name, $profilepic, $artist, $genre){
        $connection = new Connection();
        $add = $connection->connect()->prepare("INSERT INTO album (Lancamento, nome, foto, artista, genre) VALUES (:release, :name, :propic, :artist, :genre)");
        $add->bindValue(":release",$release);
        $add->bindValue(":name",$name);
        $add->bindValue(":propic",$profilepic);
        $add->bindValue(":artist",$artist);
        $add->bindValue(":genre",$genre);
        $add->execute();
    }
    public function select(){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album");
        $select->execute();
        $albums = array();
        foreach($select as $album){
            $var = new album();
            $var->setId($album["ID"]);
            $var->setRelease($album["Lancamento"]);
            $var->setName($album["nome"]);
            $var->setPhoto($album["foto"]);
            $var->setArtist($album["artista"]);
            $albums[] = $var;
        }
        return $albums;
    }
        public function selectOne($em){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album WHERE ID = :id");
        $select->bindValue(":id",$em);
        $select->execute();
        $albums = array();
        foreach($select as $album){
            $var = new album();
            $var->setId($album["ID"]);
            $var->setRelease($album["Lancamento"]);
            $var->setName($album["nome"]);
            $var->setPhoto($album["foto"]);
            $var->setArtist($album["artista"]);
            $var->setGenre($album['genre']);
            $albums[] = $var;
        }
        return $albums;
    }
    public function selectLog($em, $file, $filee, $id){
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album WHERE Lancamento = :id AND nome = :file AND foto = :img AND artista = :one");
        $select->bindValue(":id",$em);
        $select->bindValue(":file",$file);
        $select->bindValue(":img",$filee);
        $select->bindValue(":one",$id);
        $select->execute();
        foreach($select as $album){
            return $album["ID"];
        }
    }
    public function update($release, $name, $profilepic, $artist, $genre, $var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE album SET Lancamento = :release, nome = :name, foto = :propic, genre = :genre, artista = :artist WHERE ID = :var");
        $add->bindValue(":release",$release);
        $add->bindValue(":name",$name);
        $add->bindValue(":propic",$profilepic);
        $add->bindValue(":artist",$artist);
        $add->bindValue(":genre", $genre);
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function delete($var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("DELETE FROM album WHERE ID = :var");
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function selectAlbum($nome = ""){
        $nome = "%".$nome."%";
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album WHERE nome LIKE :nome");
        $select->bindValue(":nome", $nome);
        $select->execute();
        $albums = array();
        foreach($select as $album){
            $var = new album();
            $var->setId($album["ID"]);
            $var->setRelease($album["Lancamento"]);
            $var->setName($album["nome"]);
            $var->setPhoto($album["foto"]);
            $var->setArtist($album["artista"]);
            $albums[] = $var;
        }
        return $albums;
    }
        public function selectGenreAlbum($id, $nome = ""){
        $nome = "%".$nome."%";
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album WHERE genre = :genre AND nome LIKE :nome");
        $select->bindValue(":genre",$id);
        $select->bindValue(":nome", $nome);
        $select->execute();
        $albums = array();
        foreach($select as $album){
            $var = new album();
            $var->setId($album["ID"]);
            $var->setRelease($album["Lancamento"]);
            $var->setName($album["nome"]);
            $var->setPhoto($album["foto"]);
            $var->setArtist($album["artista"]);
            $albums[] = $var;
        }
        return $albums;
    }
    public function selectLatestAlbum($nome = ""){
        $nome = "%".$nome."%";
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album WHERE nome LIKE :nome ORDER BY Lancamento DESC");
        $select->bindValue(":nome", $nome);
        $select->execute();
        $albums = array();
        foreach($select as $album){
            $var = new album();
            $var->setId($album["ID"]);
            $var->setRelease($album["Lancamento"]);
            $var->setName($album["nome"]);
            $var->setPhoto($album["foto"]);
            $var->setArtist($album["artista"]);
            $albums[] = $var;
        }
        return $albums;
    }
    public function selectAlbumFromArtist($artista, $nome = ""){
        $nome = "%".$nome."%";
        $connection = new Connection();
        $select = $connection->connect()->prepare("SELECT * FROM album WHERE nome LIKE :nome AND artista = :artista");
        $select->bindValue(":nome", $nome);
        $select->bindValue(":artista", $artista);
        $select->execute();
        $albums = array();
        foreach($select as $album){
            $var = new album();
            $var->setId($album["ID"]);
            $var->setRelease($album["Lancamento"]);
            $var->setName($album["nome"]);
            $var->setPhoto($album["foto"]);
            $var->setArtist($album["artista"]);
            $albums[] = $var;
        }
        return $albums;
    }
}

