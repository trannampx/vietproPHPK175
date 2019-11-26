<?php
session_start();
    $id=$_GET['prd_id'];
    unset($_SESSION['sa'][$id]);
    if(count($_SESSION['sa'])==0){
       session_destroy();
    }
    
    header('location:../../index.php?page_layout=cart');
?>