<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$sql = "SELECT pickup_requests.*, users.name 
        FROM pickup_requests 
        INNER JOIN users ON pickup_requests.user_id = users.user_id
        ORDER BY pickup_requests.created_at DESC";
$result = $conn->query($sql);
?>

<div class="page-section">
    <h2>Manage Pickup Requests</h2>

    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Waste Type</th>
            <th>Quantity</th>
            <th>Pickup Address</th>
            <th>Preferred Date</th>
            <th>Status</th>
            <th>Update</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["pickup_id"]; ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["waste_type"]); ?></td>
            <td><?php echo htmlspecialchars($row["quantity"]); ?></td>
            <td><?php echo htmlspecialchars($row["pickup_address"]); ?></td>
            <td><?php echo htmlspecialchars($row["preferred_date"]); ?></td>
            <td><span class="status-pill"><?php echo htmlspecialchars($row["status"]); ?></span></td>
            <td>
                <form action="update_pickup_status.php" method="POST" class="inline-form">
                    <input type="hidden" name="pickup_id" value="<?php echo $row["pickup_id"]; ?>">
                    <select name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Scheduled">Scheduled</option>
                        <option value="Completed">Completed</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>