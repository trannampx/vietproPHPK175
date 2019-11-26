<?php
    session_start();
    define('security',true);
    include_once('../config/connect.php');
    include_once('../modules/paginate/paginate.php');
    if( isset($_COOKIE["name_login"]) || (isset($_SESSION['mail']) && isset($_SESSION['pass']))){
        include_once('admin.php');
    }
    else{
        include_once('login.php');
    }
    ?>