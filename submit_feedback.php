<?php
include("includes/user_session.php");
include("includes/db_connect.php");

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);
    $rating = intval($_POST["rating"]);

    $sql = "INSERT INTO feedback (user_id, subject, message, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $user_id, $subject, $message, $rating);

    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted successfully'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to submit feedback'); window.location.href='feedback.php';</script>";
    }
}
?>