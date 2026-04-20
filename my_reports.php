<?php
include("includes/user_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM waste_reports WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="page-section">
    <h2>My Waste Reports</h2>

    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>Waste Type</th>
            <th>Location</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["report_id"]; ?></td>
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
            <td><?php echo htmlspecialchars($row["status"]); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>