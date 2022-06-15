<?php

ob_start();
session_start();
date_default_timezone_set("Asia/Kolkata");

$connection = mysqli_connect("localhost", "root", "", "site");

if(!$connection){
    alertBox("Database Not Connected");
}else{
    if(isset($_SESSION['login_user_id'])){
        $login_user_id = $_SESSION['login_user_id'];
    }else{
        header("location: login/index.php");
    }
}

function alertBox($msg){
    echo "<script>alert($msg);</script>";
}

?>