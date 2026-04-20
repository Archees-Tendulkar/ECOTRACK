<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$sql = "SELECT * FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<div class="page-section">
    <h2>Manage Users</h2>

    <table class="data-table">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["user_id"]; ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td><?php echo htmlspecialchars($row["phone"]); ?></td>
            <td><?php echo htmlspecialchars($row["address"]); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>