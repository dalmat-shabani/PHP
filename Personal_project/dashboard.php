<?php
session_start();
include 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM events WHERE available_slots > 0";
$events = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_event'])) {
    $event_id = $_POST['event_id'];

    $sql = "SELECT * FROM events WHERE id = '$event_id'";
    $event = $conn->query($sql)->fetch_assoc();

    if ($event['available_slots'] > 0) {
        $sql = "INSERT INTO bookings (user_id, event_id) VALUES ('$user_id', '$event_id')";
        if ($conn->query($sql) === TRUE) {
            $update_slots = $event['available_slots'] - 1;
            $update_sql = "UPDATE events SET available_slots = '$update_slots' WHERE id = '$event_id'";
            $conn->query($update_sql);
            $success_message = "Event booked successfully!";
        } else {
            $error_message = "Error booking event: " . $conn->error;
        }
    } else {
        $error_message = "No available slots for this event.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">User Dashboard</h2>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message; ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <div class="row">
        <?php while ($event = $events->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="path/to/your/image.jpg" class="card-img-top" alt="<?= $event['title']; ?>"> <!-- Optional Image -->
                    <div class="card-body">
                        <h5 class="card-title"><?= $event['title']; ?></h5>
                        <p class="card-text"><?= substr($event['description'], 0, 100); ?>...</p>
                        <p class="card-text"><strong>Date:</strong> <?= $event['event_date']; ?></p>
                        <p class="card-text"><strong>Location:</strong> <?= $event['location']; ?></p>
                        <p class="card-text"><strong>Available Slots:</strong> <?= $event['available_slots']; ?></p>
                        <form method="POST" action="dashboard.php">
                            <input type="hidden" name="event_id" value="<?= $event['id']; ?>">
                            <button type="submit" name="book_event" class="btn btn-primary">Book</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
