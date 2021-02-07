<?php
if($_POST['jobtitle'] !== "M" && $_POST['jobtitle'] !== "F")
    header("Location: signup.html");
if($_POST['passwordConfirmation'] !== $_POST['password']){
    header("Location: signup.html");
}
else{
 require_once "userdb.php";
 $a = new userdb();
    $a->insert($_POST['jobtitle'], $_POST['lastname'], $_POST['email'], $_POST['firstname'], $_POST['password'], $_POST['phone']);
    session_start();
    $_SESSION['id'] = $a->login($_POST['email'], $_POST['password']);
    $_SESSION['type'] = 0;
    echo $_SESSION['id'];
    header("Location: userrr.php");
}