<?php
session_start();
include 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $total_slots = $_POST['total_slots'];
    $available_slots = $_POST['available_slots'];

    $sql = "INSERT INTO events (title, description, event_date, location, total_slots, available_slots)
            VALUES ('$title', '$description', '$event_date', '$location', '$total_slots', '$available_slots')";
    
    if ($conn->query($sql) === TRUE) {
        $success_message = "Event added successfully!";
    } else {
        $error_message = "Error adding event: " . $conn->error;
    }
}

$sql = "SELECT * FROM events";
$events = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">Manage Events</h2>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message; ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Add New Event</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="manage_events.php">
                <div class="mb-3">
                    <label for="title" class="form-label">Event Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Event Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="datetime-local" name="event_date" id="event_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Event Location</label>
                    <input type="text" name="location" id="location" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="total_slots" class="form-label">Total Slots</label>
                    <input type="number" name="total_slots" id="total_slots" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="available_slots" class="form-label">Available Slots</label>
                    <input type="number" name="available_slots" id="available_slots" class="form-control" required>
                </div>
                <button type="submit" name="add_event" class="btn btn-primary">Add Event</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Existing Events</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Event Date</th>
                        <th>Location</th>
                        <th>Total Slots</th>
                        <th>Available Slots</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($event = $events->fetch_assoc()): ?>
                        <tr>
                            <td><?= $event['id']; ?></td>
                            <td><?= $event['title']; ?></td>
                            <td><?= $event['description']; ?></td>
                            <td><?= $event['event_date']; ?></td>
                            <td><?= $event['location']; ?></td>
                            <td><?= $event['total_slots']; ?></td>
                            <td><?= $event['available_slots']; ?></td>
                            <td>
                                <a href="edit_event.php?id=<?= $event['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_event.php?id=<?= $event['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
