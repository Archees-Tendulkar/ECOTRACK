<?php
include("includes/admin_session.php");
include("includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_id = intval($_POST["report_id"]);
    $status = trim($_POST["status"]);

    $sql = "UPDATE waste_reports SET status = ? WHERE report_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $report_id);

    if ($stmt->execute()) {
        echo "<script>alert('Report status updated'); window.location.href='manage_reports.php';</script>";
    } else {
        echo "<script>alert('Failed to update report status'); window.location.href='manage_reports.php';</script>";
    }
}
?>