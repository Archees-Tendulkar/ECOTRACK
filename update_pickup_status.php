<?php
include("includes/admin_session.php");
include("includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup_id = intval($_POST["pickup_id"]);
    $status = trim($_POST["status"]);

    $sql = "UPDATE pickup_requests SET status = ? WHERE pickup_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $pickup_id);

    if ($stmt->execute()) {
        echo "<script>alert('Pickup status updated'); window.location.href='manage_pickups.php';</script>";
    } else {
        echo "<script>alert('Failed to update pickup status'); window.location.href='manage_pickups.php';</script>";
    }
}
?>