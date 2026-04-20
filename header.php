<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrack</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">EcoTrack</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="awareness.php">Awareness</a></li>
        <li><a href="contact.php">Contact</a></li>

        <?php if (isset($_SESSION["admin_id"])) { ?>
            <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            <li><a href="manage_users.php">Users</a></li>
            <li><a href="manage_reports.php">Reports</a></li>
            <li><a href="manage_pickups.php">Pickups</a></li>
            <li><a href="manage_feedback.php">Feedback</a></li>
            <li><a href="manage_centres.php">Centres</a></li>
            <li><a href="admin_logout.php">Logout</a></li>
        <?php } elseif (isset($_SESSION["user_id"])) { ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="report_waste.php">Report Waste</a></li>
            <li><a href="pickup_request.php">Pickup</a></li>
            <li><a href="search_centres.php">Centres</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="admin_login.php">Admin</a></li>
        <?php } ?>
    </ul>
</nav>

<div class="page-shell">