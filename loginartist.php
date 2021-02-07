<?php
 require_once "artistdb.php";
 $a = new artistdb();
    $id = $a->login($_POST['email'], $_POST['password']);
var_dump($id);
    if($id != 0){
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['type'] = 1;
    echo $_SESSION['id'];
    header("Location: artistMain.php");
    }
else{
    session_destroy();
   header("Location: loginArtist.html"); 
}