<?php
require_once 'PDOconnect.php';
require_once "musica.php";
class musicdb{
    public function insert($artist, $album, $genre, $fi, $name){
        $connection = new Connection();
        $add = $connection->connect()->prepare("INSERT INTO musica (artista, album, genero, arquivo, nome) VALUES (:artist, :album, :genre, :file, :name)");
        $add->bindValue(":artist",$artist);
        $add->bindValue(":album",$album);
        $add->bindValue(":genre",$genre);
        $add->bindValue(":file",$fi);
        $add->bindValue(":name",$name);
        $add->execute();
    }
    public function update($artist, $album, $genre, $fi, $name, $var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("UPDATE musica SET artista = :artist, album = :album, genero = :genre, arquivo = :file, nome = :name WHERE id = :var");
        $add->bindValue(":artist",$artist);
        $add->bindValue(":album",$album);
        $add->bindValue(":genre",$genre);
        $add->bindValue(":file",$fi);
        $add->bindValue(":name",$name);
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function delete($var){
        $connection = new Connection();
        $add = $connection->connect()->prepare("DELETE FROM musica WHERE id = :var");
        $add->bindValue(":var",$var);
        $add->execute();
    }
    public function select(){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM musica");
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $musics[] = $var;
        }
        return $musics;
    }
    public function selectOne($id){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT * FROM musica WHERE id = :id");
        $add->bindValue(":id", $id);
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $musics[] = $var;
        }
        return $musics;
    }
    public function selectMusic($nome = ""){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT musica.id, musica.artista, musica.album, musica.genero, musica.arquivo, musica.nome, album.foto, album.nome as aname FROM musica INNER JOIN album ON album.id = musica.album WHERE musica.nome LIKE :nome");
        $nome = "%".$nome."%";
        $add->bindValue(":nome",$nome);
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $var->setPhoto($music["foto"]);
            $var->setAn($music['aname']);
            $musics[] = $var;
        }
        return $musics;
    }
        public function selectGenreMusic($id, $nome = ""){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT musica.id, musica.artista, musica.album, musica.genero, musica.arquivo, musica.nome, album.foto, album.nome as aname FROM musica INNER JOIN album ON album.id = musica.album WHERE genero = :genre AND musica.nome LIKE :nome");
        $nome = "%".$nome."%";
        $add->bindValue(":nome",$nome);
        $add->bindValue(":genre", $id);
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $var->setPhoto($music["foto"]);
            $var->setAn($music['aname']);
            $musics[] = $var;
        }
        return $musics;
    }
            public function selectAlbumMusic($id, $nome = ""){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT musica.id, musica.artista, musica.album, musica.genero, musica.arquivo, musica.nome, album.foto, album.nome as aname FROM musica INNER JOIN album ON album.id = musica.album WHERE album.ID = :genre AND musica.nome LIKE :nome");
        $nome = "%".$nome."%";
        $add->bindValue(":nome",$nome);
        $add->bindValue(":genre", $id);
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $var->setPhoto($music["foto"]);
            $var->setAn($music['aname']);
            $musics[] = $var;
        }
        return $musics;
    }
        public function selectLatestMusic($nome = ""){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT musica.id, musica.artista, musica.album, musica.genero, musica.arquivo, musica.nome, album.Lancamento, album.foto, album.nome as aname FROM musica INNER JOIN album ON album.id = musica.album WHERE musica.nome LIKE :nome ORDER BY album.Lancamento DESC");
        $nome = "%".$nome."%";
        $add->bindValue(":nome",$nome);
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $var->setPhoto($music["foto"]);
            $var->setAn($music['aname']);
            $musics[] = $var;
        }
        return $musics;
    }
        public function selectMusicFromArtist($addd, $nome = ""){
        $connection = new Connection();
        $add = $connection->connect()->prepare("SELECT musica.id, musica.artista, musica.album, musica.genero, musica.arquivo, musica.nome, album.foto, album.nome as aname FROM musica INNER JOIN album ON album.id = musica.album WHERE musica.nome LIKE :nome AND musica.artista = :select");
        $nome = "%".$nome."%";
        $add->bindValue(":nome",$nome);
        $add->bindValue(":select", $addd);
        $add->execute();
        $musics = array();
        foreach($add as $music){
            $var = new musica();
            $var->setId($music["id"]);
            $var->setArtista($music["artista"]);
            $var->setAlbum($music["album"]);
            $var->setGenero($music["genero"]);
            $var->setArquivo($music["arquivo"]);
            $var->setNome($music["nome"]);
            $var->setPhoto($music["foto"]);
            $var->setAn($music['aname']);
            $musics[] = $var;
        }
        return $musics;
    }
}