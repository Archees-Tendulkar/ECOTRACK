<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$result = $conn->query("SELECT * FROM recycling_centres ORDER BY centre_id DESC");
?>

<div class="page-section">
    <div class="title-row">
        <h2>Manage Recycling Centres</h2>
        <a class="small-btn" href="add_centre.php">Add New Centre</a>
    </div>

    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>Centre Name</th>
            <th>Waste Type</th>
            <th>Address</th>
            <th>Area</th>
            <th>Contact</th>
            <th>Opening Hours</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["centre_id"]; ?></td>
            <td><?php echo htmlspecialchars($row["centre_name"]); ?></td>
            <td><?php echo htmlspecialchars($row["waste_type"]); ?></td>
            <td><?php echo htmlspecialchars($row["address"]); ?></td>
            <td><?php echo htmlspecialchars($row["area"]); ?></td>
            <td><?php echo htmlspecialchars($row["contact_number"]); ?></td>
            <td><?php echo htmlspecialchars($row["opening_hours"]); ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include("includes/footer.php"); ?>