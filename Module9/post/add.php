<?php
//With this file we inculde the database connection
include_once("config.php");

//issset() function determine if a variable is declared and is different from null
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name, username, email) VALUES (:name, :username, :email)";

    $sqlQuery = $connect->prepare($sql);

    $sqlQuery->bindPARAM(':name', $name);
    $sqlQuery->bindPARAM(':username', $username);
    $sqlQuery->bindPARAM(':email', $email);

    $sqlQuery->execute();

    echo"The user was added sucessfully";
}
?>