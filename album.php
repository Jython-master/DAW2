<?php
class album{
    private $id;
    private $release;
    private $name;
    private $photo;
    private $artist;
    private $genre;
    public function getId() {
        return $this->id;
    }

    public function getRelease() {
        return $this->release;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getArtist() {
        return $this->artist;
    }
    public function getGenre(){
        return $this->genre;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRelease($release) {
        $this->release = $release;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setArtist($artist) {
        $this->artist = $artist;
    }
    public function setGenre($genre){
        $this->genre = $genre;
    }


}