<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "new_db";

try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
    //echo"Connected sucessfully";
}catch(Exeption $e){
    echo "Something went wrong!!!";
}
?>