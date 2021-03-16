<?php

session_start();

if(!isset($_SESSION['chk'])){
    header('location:login.php');
}

?>