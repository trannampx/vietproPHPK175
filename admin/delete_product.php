<?php
    session_start();
    
    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
        define('security',true);
        include_once('../config/connect.php');  
        $prd_id=$_GET['prd_id'];
        $delete_prd=mysqli_query($conn,"DELETE FROM product WHERE prd_id=$prd_id");
        header('location:index.php?page_layout=product');
    }
    else{
        header('location:index.php');
    }

   

?>