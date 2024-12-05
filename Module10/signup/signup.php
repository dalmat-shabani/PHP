<?php

$host = 'localhost';
$dbname = 'user_managment';
$username = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //set PDO error mode to exepction
   // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);

    //echo"Connected";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(empty($user) || empty($email) || empty($pass)){
            echo "All the fields are required";
            exit;
        }

        // hash the pass
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

        //prepare sql statment
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);

        //Bind parameters
        $stmt-> bindParam(':username', $user, PDO::PARAM_STR);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':password', $hashed_password, PDO::PARAM_STR);

        //ececute the statment
        if($stmt->execute()){
            echo"Signup succsesfull!!";
        }else{
            echo"something went wrong!!";
        }

    }

}catch(PDOExeption $e){
    echo "Error: ".$e->getMessage();
}

?>