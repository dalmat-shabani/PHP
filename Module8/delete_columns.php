<?php

try{
    //Connect to database
    $pdo = new PDO("mysql:host=localhost; dbname=testdb", "root", "");

    $sql = "ALTER TABLE users DROP COLUMN email";

    $pdo->exec($sql);

    echo"Column delted successfully";
}catch(PDOExeption $e){
    echo $E->getMessage();
}

?>