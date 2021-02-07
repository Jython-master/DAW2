<?php
require_once "logininininin.php";
require_once "musicdb.php";
$a = new musicdb();
$a->delete($_POST['id']);
header("Location: artistMain.php");