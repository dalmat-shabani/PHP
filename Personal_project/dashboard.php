<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$events = $conn->query("SELECT * FROM events WHERE available_slots > 0 ORDER BY event_date ASC");
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
                <li class="nav-item"><a class="nav-link" href="my_bookings.php">My Bookings</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center">Welcome, <?= htmlspecialchars($user_name) ?></h2>

    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <h4>Available Events</h4>
            <ul class="list-group">
                <?php while ($event = $events->fetch_assoc()): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($event['title']) ?></strong><br>
                        <small><?= $event['event_date'] ?> | <?= htmlspecialchars($event['location']) ?></small>
                        <form method="POST" action="book_event.php" class="d-inline">
                            <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                            <button type="submit" class="btn btn-primary btn-sm float-end">Book</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
