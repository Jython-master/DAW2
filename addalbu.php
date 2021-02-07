<?php
require_once "logininininin.php";
require_once "albumdb.php";
$target_dir = "img/";
    $image =  time().strtolower($_FILES['prop']['name']);
$a = new albumdb();
$a->insert($_POST['lastname'],$_POST['firstname'],$image,$_SESSION['id'],$_POST['jobtitle']);
 move_uploaded_file($_FILES['prop']['tmp_name'], $target_dir.$image);
$a = $a->selectLog($_POST['lastname'],$_POST['firstname'],$image,$_SESSION['id']);
header("Location: AddSonglalb.php?id=".$a);