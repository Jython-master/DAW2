<?php
session_start();
if(!($_SESSION['type'] === 0 && isset($_SESSION['id']))){
    session_destroy();
    header("Location: login.html");
}