<?php
if($_POST['passwordConfirmation'] !== $_POST['password']){
    /*header("Location: signup.html");*/
    echo ""
}
else{
 require_once "userdb.php";
 $a = new userdb();
    $a->insert($_POST['jobtitle'], $_POST['lastname'], $_POST['email'], $_POST['firstname'], $_POST['password'], $_POST['phone']);
    session_start();
    $_SESSION['id'] = $a->login($_POST['email'], $_POST['password']);
    echo $_SESSION['id'];
}