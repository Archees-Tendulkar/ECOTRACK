<?php
include("includes/user_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];

$report_count = 0;
$pickup_count = 0;
$feedback_count = 0;

$sql1 = "SELECT COUNT(*) AS total_reports FROM waste_reports WHERE user_id = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $user_id);
$stmt1->execute();
$result1 = $stmt1->get_result();
if ($row = $result1->fetch_assoc()) {
    $report_count = $row["total_reports"];
}

$sql2 = "SELECT COUNT(*) AS total_pickups FROM pickup_requests WHERE user_id = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
if ($row = $result2->fetch_assoc()) {
    $pickup_count = $row["total_pickups"];
}

$sql3 = "SELECT COUNT(*) AS total_feedback FROM feedback WHERE user_id = ?";
$stmt3 = $conn->prepare($sql3);
$stmt3->bind_param("i", $user_id);
$stmt3->execute();
$result3 = $stmt3->get_result();
if ($row = $result3->fetch_assoc()) {
    $feedback_count = $row["total_feedback"];
}
?>

<div class="page-section">
    <h2>Welcome, <?php echo htmlspecialchars($user_name); ?></h2>
    <p>This is your EcoTrack dashboard.</p>

    <div class="card-grid">
        <div class="info-card">
            <h3>Total Waste Reports</h3>
            <p><?php echo $report_count; ?></p>
        </div>

        <div class="info-card">
            <h3>Total Pickup Requests</h3>
            <p><?php echo $pickup_count; ?></p>
        </div>

        <div class="info-card">
            <h3>Total Feedback Given</h3>
            <p><?php echo $feedback_count; ?></p>
        </div>
    </div>

    <div class="card-grid">
        <a class="action-card" href="report_waste.php">Report Waste</a>
        <a class="action-card" href="pickup_request.php">Request Pickup</a>
        <a class="action-card" href="search_centres.php">Search Centres</a>
        <a class="action-card" href="my_reports.php">My Reports</a>
        <a class="action-card" href="my_pickups.php">My Pickups</a>
        <a class="action-card" href="feedback.php">Give Feedback</a>
    </div>
</div>

<?php include("includes/footer.php"); ?>