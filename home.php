<?php
    session_start();
    if(!isset($_SESSION['id']))
    { 
        header("location: index.php");
        exit;
    }

?>


SEJA BEM VINDO!

<a href="exit.php"> Logout </a>