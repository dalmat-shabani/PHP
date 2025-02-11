<?php
include_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event_id'])) {
    $user_id = $_SESSION['user_id'];
    $event_id = intval($_POST['event_id']);

    // Check if user already booked this event
    $check_booking = $conn->prepare("SELECT id FROM bookings WHERE user_id = ? AND event_id = ?");
    $check_booking->bind_param("ii", $user_id, $event_id);
    $check_booking->execute();
    $result = $check_booking->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "You have already booked this event.";
    } else {
        // Check event availability
        $get_event = $conn->prepare("SELECT available_slots FROM events WHERE id = ?");
        $get_event->bind_param("i", $event_id);
        $get_event->execute();
        $event_result = $get_event->get_result();
        $event = $event_result->fetch_assoc();

        if ($event && $event['available_slots'] > 0) {
            // Insert booking
            $insert_booking = $conn->prepare("INSERT INTO bookings (user_id, event_id) VALUES (?, ?)");
            $insert_booking->bind_param("ii", $user_id, $event_id);

            if ($insert_booking->execute()) {
                // Reduce available slots
                $update_slots = $conn->prepare("UPDATE events SET available_slots = available_slots - 1 WHERE id = ?");
                $update_slots->bind_param("i", $event_id);
                $update_slots->execute();

                $_SESSION['success_message'] = "Event booked successfully!";
            } else {
                $_SESSION['error_message'] = "Error booking event.";
            }
        } else {
            $_SESSION['error_message'] = "No available slots for this event.";
        }
    }
}

header("Location: dashboard.php");
exit();
?>
