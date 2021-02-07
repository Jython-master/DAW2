<?php
class artist{
    private $id;
    private $foryear;
    private $descp;
    private $profpic;
    private $pass;
    private $email;
    private $name;
    private $desc;
    private $cover;
    private $country;
    public function getId() {
        return $this->id;
    }

    public function getForyear() {
        return $this->foryear;
    }

    public function getDescp() {
        return $this->descp;
    }

    public function getProfpic() {
        return $this->profpic;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getCover() {
        return $this->cover;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setForyear($foryear) {
        $this->foryear = $foryear;
    }

    public function setDescp($descp) {
        $this->descp = $descp;
    }

    public function setProfpic($profpic) {
        $this->profpic = $profpic;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function setCover($cover) {
        $this->cover = $cover;
    }

    public function setCountry($country) {
        $this->country = $country;
    }


}