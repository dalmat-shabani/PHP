<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    
    $sql = "SELECT * FROM events WHERE id = '$event_id'";
    $event = $conn->query($sql)->fetch_assoc();

    if ($event && $event['available_slots'] > 0) {
        
        $sql = "INSERT INTO bookings (user_id, event_id) VALUES ('$user_id', '$event_id')";
        if ($conn->query($sql) === TRUE) {
            
            $update_slots = $event['available_slots'] - 1;
            $update_sql = "UPDATE events SET available_slots = '$update_slots' WHERE id = '$event_id'";
            $conn->query($update_sql);
            
            
            header("Location: my_bookings.php");
            exit();
        } else {
            $error_message = "Error booking event: " . $conn->error;
        }
    } else {
        $error_message = "No available slots for this event.";
    }
}


header("Location: dashboard.php");
exit();
?>
