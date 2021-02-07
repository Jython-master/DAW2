<?php
require_once "logininin.php";
session_start();
require_once "userdb.php";
$asd = new userdb();
$asd->delete($_SESSION['id']);
session_destroy();
header("Location: login.html");