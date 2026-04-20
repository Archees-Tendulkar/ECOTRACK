<?php
include("includes/user_session.php");
include("includes/db_connect.php");

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waste_type = trim($_POST["waste_type"]);
    $location = trim($_POST["location"]);
    $description = trim($_POST["description"]);

    $image_name = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_path = "uploads/" . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_path);
    }

    $sql = "INSERT INTO waste_reports (user_id, waste_type, description, location, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $waste_type, $description, $location, $image_name);

    if ($stmt->execute()) {
        echo "<script>alert('Waste report submitted successfully'); window.location.href='my_reports.php';</script>";
    } else {
        echo "<script>alert('Failed to submit report'); window.location.href='report_waste.php';</script>";
    }
}
?>