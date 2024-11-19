<?php

try{
    //Connect to database
    $pdo = new PDO("mysql:host=localhost; dbname=testdb", "root", "");

    //Table alqertaio SQL
    $sql = "ALTER TABLE users ADD email VARCHAR(255)";

    $pdo ->exec($sql);

    echo"Column created succesfully";
}catch(PDOExeption $e){
    echo"Error creating column!", $e->getMessage();
}

?>