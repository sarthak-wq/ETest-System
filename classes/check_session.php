<?php 

    session_start();

    if(empty($_SESSION['etsoftId'])){
        header("location:./index.php");
    }

?>