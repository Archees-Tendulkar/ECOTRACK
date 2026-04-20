<?php
include("includes/user_session.php");
include("includes/db_connect.php");

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waste_type = trim($_POST["waste_type"]);
    $quantity = trim($_POST["quantity"]);
    $pickup_address = trim($_POST["pickup_address"]);
    $preferred_date = $_POST["preferred_date"];

    $sql = "INSERT INTO pickup_requests (user_id, waste_type, quantity, pickup_address, preferred_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $waste_type, $quantity, $pickup_address, $preferred_date);

    if ($stmt->execute()) {
        echo "<script>alert('Pickup request submitted successfully'); window.location.href='my_pickups.php';</script>";
    } else {
        echo "<script>alert('Failed to submit pickup request'); window.location.href='pickup_request.php';</script>";
    }
}
?>