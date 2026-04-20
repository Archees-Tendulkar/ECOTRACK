<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$total_users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()["total"];
$total_reports = $conn->query("SELECT COUNT(*) AS total FROM waste_reports")->fetch_assoc()["total"];
$total_pickups = $conn->query("SELECT COUNT(*) AS total FROM pickup_requests")->fetch_assoc()["total"];
$total_feedback = $conn->query("SELECT COUNT(*) AS total FROM feedback")->fetch_assoc()["total"];
$total_centres = $conn->query("SELECT COUNT(*) AS total FROM recycling_centres")->fetch_assoc()["total"];
?>

<div class="page-section">
    <div class="hero-lite">
        <h2>Admin Dashboard</h2>
        <p>Manage users, reports, pickup requests, feedback, and recycling centres.</p>
    </div>

    <div class="card-grid">
        <div class="info-card pastel-mint">
            <h3>Total Users</h3>
            <p><?php echo $total_users; ?></p>
        </div>

        <div class="info-card pastel-peach">
            <h3>Total Reports</h3>
            <p><?php echo $total_reports; ?></p>
        </div>

        <div class="info-card pastel-lavender">
            <h3>Total Pickups</h3>
            <p><?php echo $total_pickups; ?></p>
        </div>

        <div class="info-card pastel-blue">
            <h3>Total Feedback</h3>
            <p><?php echo $total_feedback; ?></p>
        </div>

        <div class="info-card pastel-yellow">
            <h3>Total Centres</h3>
            <p><?php echo $total_centres; ?></p>
        </div>
    </div>

    <div class="card-grid">
        <a class="action-card" href="manage_users.php">Manage Users</a>
        <a class="action-card" href="manage_reports.php">Manage Reports</a>
        <a class="action-card" href="manage_pickups.php">Manage Pickups</a>
        <a class="action-card" href="manage_feedback.php">Manage Feedback</a>
        <a class="action-card" href="manage_centres.php">Manage Centres</a>
        <a class="action-card" href="admin_logout.php">Logout</a>
    </div>
</div>

<?php include("includes/footer.php"); ?>