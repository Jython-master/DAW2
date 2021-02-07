<?php
class user{
    private $id;
    private $gender;
    private $bd;
    private $email;
    private $name;
    private $pass;
    private $phone;
    public function getId() {
        return $this->id;
    }
    public function getPhone(){
        return $this->phone;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getBd() {
        return $this->bd;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getPass() {
        return $this->pass;
    }

    function setId($id) {
        $this->id = $id;
    }
    public function setPhone($phone){
        return $this->phone = $phone;
    }
    function setGender($gender) {
        $this->gender = $gender;
    }

    function setBd($bd) {
        $this->bd = $bd;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }


    
}