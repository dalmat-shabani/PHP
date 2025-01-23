<?php 

include_once("config.php");

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];

    $email = $_POST['email'];

$sql = "UPDATE users SET name=:name, surname=:surname, username=;username, email=;email WHERE id=;id";

$prop = $conn->prepare($sql);

$prepare->bindParam(':id', $id);
$prepare->bindParam(':name', $name);
$prepare->bindParam(':surname', $surname);
$prepare->bindParam(':username', $username);
$prepare->bindParam(':email', $email);


$prep->ecxecute();

header("Location: dashboard.php");
}

?>