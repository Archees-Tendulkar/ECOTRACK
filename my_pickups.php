<?php
include("includes/user_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM pickup_requests WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="page-section">
    <h2>My Pickup Requests</h2>

    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>Waste Type</th>
            <th>Quantity</th>
            <th>Pickup Address</th>
            <th>Preferred Date</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["pickup_id"]; ?></td>
            <td><?php echo htmlspecialchars($row["waste_type"]); ?></td>
            <td><?php echo htmlspecialchars($row["quantity"]); ?></td>
            <td><?php echo htmlspecialchars($row["pickup_address"]); ?></td>
            <td><?php echo htmlspecialchars($row["preferred_date"]); ?></td>
            <td><?php echo htmlspecialchars($row["status"]); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>