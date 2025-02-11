<?php
include_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['booking_id'])) {
    $booking_id = intval($_GET['booking_id']);

    
    $get_event = $conn->prepare("SELECT event_id FROM bookings WHERE id = ?");
    $get_event->bind_param("i", $booking_id);
    $get_event->execute();
    $result = $get_event->get_result();
    $event = $result->fetch_assoc();
    
    if ($event) {
        $event_id = $event['event_id'];

       
        $delete_booking = $conn->prepare("DELETE FROM bookings WHERE id = ?");
        $delete_booking->bind_param("i", $booking_id);

        if ($delete_booking->execute()) {
        
            $increase_slots = $conn->prepare("UPDATE events SET available_slots = available_slots + 1 WHERE id = ?");
            $increase_slots->bind_param("i", $event_id);
            $increase_slots->execute();

            $_SESSION['success_message'] = "Booking canceled successfully!";
        } else {
            $_SESSION['error_message'] = "Error canceling booking.";
        }
    }
}

header("Location: dashboard.php");
exit();
?>
