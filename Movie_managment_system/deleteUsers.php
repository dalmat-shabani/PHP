<?php 

include_once("sonfig.php");

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = :id";

$deleteUser = $conn->prepare($sql);

$deleteUser->bindParam(":id", $ud);

$deleteUser->execute();

header("Location: dashboard.php");

?>