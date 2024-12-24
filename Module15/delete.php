<?php

include 'db.php';

$id = $_GET['id'];

if(isset($id) && is_numeric($id)){
    $conn->query("DELETE FROM products WHERE id=$id");
}

header('Location: index.php');
exit;

?>