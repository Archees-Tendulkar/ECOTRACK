<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$sql = "SELECT feedback.*, users.name 
        FROM feedback 
        INNER JOIN users ON feedback.user_id = users.user_id
        ORDER BY feedback.created_at DESC";
$result = $conn->query($sql);
?>

<div class="page-section">
    <h2>Manage Feedback</h2>

    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Rating</th>
            <th>Date</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["feedback_id"]; ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["subject"]); ?></td>
            <td><?php echo htmlspecialchars($row["message"]); ?></td>
            <td><?php echo htmlspecialchars($row["rating"]); ?>/5</td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>