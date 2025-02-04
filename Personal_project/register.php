<?php
include 'config.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); 
    $role = 'user'; 


    $checkEmail = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $error = "Email is already registered!";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if ($conn->query($sql)) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_name'] = $name;
            $_SESSION['role'] = $role;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>