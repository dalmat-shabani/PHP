<?php
session_start();
include 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "No event selected.";
    header("Location: index.php");
    exit();
}

$event_id = $_GET['id'];

// Fetch existing event data
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();
$stmt->close();

if (!$event) {
    $_SESSION['error'] = "Event not found.";
    header("Location: index.php");
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $event_date = $_POST['event_date'];
    $location = trim($_POST['location']);
    $available_slots = intval($_POST['available_slots']);

    $stmt = $conn->prepare("UPDATE events SET title = ?, description = ?, event_date = ?, location = ?, available_slots = ? WHERE id = ?");
    $stmt->bind_param("ssssii", $title, $description, $event_date, $location, $available_slots, $event_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Event updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Error updating event: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">Update Event</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($event['title']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required><?= htmlspecialchars($event['description']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Event Date</label>
            <input type="date" name="event_date" class="form-control" value="<?= $event['event_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($event['location']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="available_slots" class="form-label">Available Slots</label>
            <input type="number" name="available_slots" class="form-control" value="<?= $event['available_slots']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Update Event</button>
        <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
    </form>
</div>
</body>
</html>
