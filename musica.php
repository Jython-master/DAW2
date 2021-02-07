<?php
class musica{
    private $id;
    private $artista;
    private $album;
    private $genero;
    private $arquivo;
    private $nome;
    private $photo;
    private $an;
    public function getId() {
        return $this->id;
    }

    public function getArtista() {
        return $this->artista;
    }

    public function getAlbum() {
        return $this->album;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

    public function getNome() {
        return $this->nome;
    }
    public function getPhoto() {
        return $this->photo;
    }
    public function getAn() {
        return $this->an;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setArtista($artista) {
        $this->artista = $artista;
    }

    public function setAlbum($album) {
        $this->album = $album;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
        public function setPhoto($photo) {
        $this->photo = $photo;
    }
    public function setAn($an) {
        $this->an = $an;
    }


}