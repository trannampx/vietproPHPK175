<?php 
    session_start();
    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
        session_destroy();
    }
    if( isset($_COOKIE["name_login"])){
        setcookie( "name_login", "", time()-604800, "/","", 0);
    }
    header('location:index.php');

?>