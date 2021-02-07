<?php
session_start();
if(!($_SESSION['type'] === 1 && isset($_SESSION['id']))){
    session_destroy();
    header("Location: loginArtist.html");
}