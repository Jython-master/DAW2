<?php
require_once "logininininin.php";
require_once "albumdb.php";
$a = new albumdb();
$a->delete($_POST['id']);
header("Location: artistMain.php");