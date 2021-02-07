<?php
 require_once "userdb.php";
 $a = new userdb();
    $id = $a->login($_POST['email'], $_POST['password']);
    if($id != 0){
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['type'] = 0;
    echo $_SESSION['id'];
    header("Location: userrr.php");
    }
else{
    session_destroy();
   header("Location: login.html"); 
}