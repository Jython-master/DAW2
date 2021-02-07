<?php
require_once "logininininin.php";
session_start();
require_once "artistdb.php";
$asd = new Artistdb();
$asd->delete($_SESSION['id']);
session_destroy();
header("Location: loginArtist.html");