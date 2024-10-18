<?php 

    session_start();
    $username = $_SESSION['username'];
    if(!$_SESSION['username']){
        header('location:index.php');
    }


    
        



?>