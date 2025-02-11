<?php
include_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Fetch events
$events = $conn->query("SELECT * FROM events WHERE available_slots > 0 ORDER BY event_date ASC");

// Fetch user bookings
$bookings = $conn->query("
    SELECT bookings.id AS booking_id, events.id AS event_id, events.title, events.event_date, events.location
    FROM bookings
    JOIN events ON bookings.event_id = events.id
    WHERE bookings.user_id = $user_id
");

if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
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

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?= $success_message; ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-danger"><?= $error_message; ?></div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Upcoming Events</h4>
            <ul class="list-group">
                <?php while ($event = $events->fetch_assoc()): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($event['title']) ?></strong><br>
                        <small><?= $event['event_date'] ?> | <?= htmlspecialchars($event['location']) ?></small>
                        <form method="POST" action="book_event.php" class="d-inline">
                            <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                            <button type="submit" name="book_event" class="btn btn-primary btn-sm float-end">Book</button>
                        </form>
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
