<?php

try{
$pdo = new PDO("mysql:host=localhost; dbname=testdb", "root", "");

$sql = "DROP TABLE users";

$pdo -> exec($sql);

echo"Table deleted successfully";
}catch(PDOExeption $e){
    echo $e->getMessage();
}

?>