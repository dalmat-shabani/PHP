<?php
include_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$events = $conn->query("SELECT * FROM events ORDER BY event_date ASC");

$bookings = $conn->query("
    SELECT bookings.id AS booking_id, events.title, events.event_date, events.location
    FROM bookings
    JOIN events ON bookings.event_id = events.id
    WHERE bookings.user_id = $user_id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Event Booking</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center">Welcome, <?= htmlspecialchars($user_name) ?>!</h2>

    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Upcoming Events</h4>
            <ul class="list-group">
                <?php while ($event = $events->fetch_assoc()): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($event['title']) ?></strong><br>
                        <small><?= $event['event_date'] ?> | <?= htmlspecialchars($event['location']) ?></small>
                        <a href="book_event.php?event_id=<?= $event['id'] ?>" class="btn btn-primary btn-sm float-end">Book</a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

       
        <div class="col-md-6">
            <h4>My Bookings</h4>
            <ul class="list-group">
                <?php while ($booking = $bookings->fetch_assoc()): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($booking['title']) ?></strong><br>
                        <small><?= $booking['event_date'] ?> | <?= htmlspecialchars($booking['location']) ?></small>
                        <a href="cancel_booking.php?booking_id=<?= $booking['booking_id'] ?>" class="btn btn-danger btn-sm float-end">Cancel</a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
