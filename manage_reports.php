<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$sql = "SELECT waste_reports.*, users.name 
        FROM waste_reports 
        INNER JOIN users ON waste_reports.user_id = users.user_id
        ORDER BY waste_reports.created_at DESC";
$result = $conn->query($sql);
?>

<div class="page-section">
    <h2>Manage Waste Reports</h2>

    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Waste Type</th>
            <th>Location</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Update</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["report_id"]; ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["waste_type"]); ?></td>
            <td><?php echo htmlspecialchars($row["location"]); ?></td>
            <td><?php echo htmlspecialchars($row["description"]); ?></td>
            <td>
                <?php if (!empty($row["image"])) { ?>
                    <img src="uploads/<?php echo $row["image"]; ?>" width="80">
                <?php } else { ?>
                    No Image
                <?php } ?>
            </td>
            <td><span class="status-pill"><?php echo htmlspecialchars($row["status"]); ?></span></td>
            <td>
                <form action="update_report_status.php" method="POST" class="inline-form">
                    <input type="hidden" name="report_id" value="<?php echo $row["report_id"]; ?>">
                    <select name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Resolved">Resolved</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>