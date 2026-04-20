<?php
include("includes/user_session.php");
include("includes/db_connect.php");
include("includes/header.php");

$search = "";
$waste_type = "";

$sql = "SELECT * FROM recycling_centres WHERE 1=1";

if (isset($_GET["search"])) {
    $search = trim($_GET["search"]);
    $waste_type = trim($_GET["waste_type"]);

    if (!empty($search)) {
        $sql .= " AND (centre_name LIKE '%$search%' OR area LIKE '%$search%' OR address LIKE '%$search%')";
    }

    if (!empty($waste_type)) {
        $sql .= " AND waste_type = '$waste_type'";
    }
}

$result = $conn->query($sql);
?>

<div class="page-section">
    <h2>Search Recycling Centres</h2>

    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search by centre name or area" value="<?php echo htmlspecialchars($search); ?>">

        <select name="waste_type">
            <option value="">All Waste Types</option>
            <option value="Plastic">Plastic</option>
            <option value="Paper">Paper</option>
            <option value="Glass">Glass</option>
            <option value="Metal">Metal</option>
            <option value="Organic">Organic</option>
            <option value="E-Waste">E-Waste</option>
            <option value="Mixed Waste">Mixed Waste</option>
        </select>

        <button type="submit">Search</button>
    </form>

    <table class="data-table">
        <tr>
            <th>Centre Name</th>
            <th>Waste Type</th>
            <th>Address</th>
            <th>Area</th>
            <th>Contact</th>
            <th>Opening Hours</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
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