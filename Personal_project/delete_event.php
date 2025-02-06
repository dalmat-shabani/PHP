<?php
session_start();
include 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $sql = "DELETE FROM events WHERE id = '$event_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_events.php");
        exit();
    } else {
        $error_message = "Error deleting event: " . $conn->error;
    }
} else {
    header("Location: manage_events.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">Delete Event</h2>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Are you sure you want to delete this event?</h5>
        </div>
        <div class="card-body">
            <a href="manage_events.php" class="btn btn-secondary">Cancel</a>
            <a href="delete_event.php?id=<?= $_GET['id']; ?>" class="btn btn-danger">Yes, Delete</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
