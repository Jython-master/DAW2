<?php
require_once "logininininin.php";
require_once "musicdb.php";
$a = new musicdb();
$target_dir = "music/";
    $image =  time().strtolower($_FILES['prop']['name']);
$a->update($_SESSION['id'], $_POST['album'], $_POST['jobtitle'], $image, $_POST['email'], $_POST['id']);
move_uploaded_file($_FILES['prop']['tmp_name'], $target_dir.$image);
header("Location: artistMain.php");