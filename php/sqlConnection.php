<?php
//Connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "project1";

$sql = new mysqli($hostname, $username, $password, $dbname);
if($sql->error) {
    echo "Could not connect to the database: ".$sql->error;
} 



?>