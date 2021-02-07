<?php
if($_POST['jobtitle'] !== "M" && $_POST['jobtitle'] !== "F")
    header("Location: updateuser.php");
if($_POST['passwordConfirmation'] !== $_POST['password']){
    header("Location: updateuser.php");
}
else{
 require_once "userdb.php";
       session_start();
 $a = new userdb();
    $a->update($_POST['jobtitle'], $_POST['lastname'], $_POST['email'], $_POST['firstname'], $_POST['password'], $_POST['phone'], $_SESSION['id']);
    header("Location: userrr.php");
}