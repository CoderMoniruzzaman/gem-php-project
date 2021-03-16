<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "office_one";

$db_conection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$db_conection) {
    echo "connection failed :( ";
}


?>