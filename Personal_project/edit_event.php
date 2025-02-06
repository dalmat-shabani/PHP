<?php
session_start();
include 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $sql = "SELECT * FROM events WHERE id = '$event_id'";
    $result = $conn->query($sql);
    $event = $result->fetch_assoc();
    
    if (!$event) {
        header("Location: manage_events.php");
        exit();
    }
} else {
    header("Location: manage_events.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $total_slots = $_POST['total_slots'];
    $available_slots = $_POST['available_slots'];

    $sql = "UPDATE events SET title='$title', description='$description', event_date='$event_date', location='$location', 
            total_slots='$total_slots', available_slots='$available_slots' WHERE id='$event_id'";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Event updated successfully!";
    } else {
        $error_message = "Error updating event: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">Edit Event</h2>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message; ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Edit Event Details</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="edit_event.php?id=<?= $event['id']; ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Event Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= $event['title']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Event Description</label>
                    <textarea name="description" id="description" class="form-control" required><?= $event['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="datetime-local" name="event_date" id="event_date" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($event['event_date'])); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Event Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="<?= $event['location']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="total_slots" class="form-label">Total Slots</label>
                    <input type="number" name="total_slots" id="total_slots" class="form-control" value="<?= $event['total_slots']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="available_slots" class="form-label">Available Slots</label>
                    <input type="number" name="available_slots" id="available_slots" class="form-control" value="<?= $event['available_slots']; ?>" required>
                </div>
                <button type="submit" name="update_event" class="btn btn-primary">Update Event</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
