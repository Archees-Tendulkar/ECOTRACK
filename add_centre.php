<?php
include("includes/admin_session.php");
include("includes/db_connect.php");
include("includes/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $centre_name = trim($_POST["centre_name"]);
    $waste_type = trim($_POST["waste_type"]);
    $address = trim($_POST["address"]);
    $area = trim($_POST["area"]);
    $contact_number = trim($_POST["contact_number"]);
    $opening_hours = trim($_POST["opening_hours"]);

    $sql = "INSERT INTO recycling_centres (centre_name, waste_type, address, area, contact_number, opening_hours)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $centre_name, $waste_type, $address, $area, $contact_number, $opening_hours);

    if ($stmt->execute()) {
        echo "<script>alert('Centre added successfully'); window.location.href='manage_centres.php';</script>";
    } else {
        echo "<script>alert('Failed to add centre'); window.location.href='add_centre.php';</script>";
    }
}
?>

<div class="form-container glass-card">
    <h2>Add Recycling Centre</h2>
    <form method="POST">
        <input type="text" name="centre_name" placeholder="Centre Name" required>

        <select name="waste_type" required>
            <option value="">Select Waste Type</option>
            <option value="Plastic">Plastic</option>
            <option value="Paper">Paper</option>
            <option value="Glass">Glass</option>
            <option value="Metal">Metal</option>
            <option value="Organic">Organic</option>
            <option value="E-Waste">E-Waste</option>
            <option value="Mixed Waste">Mixed Waste</option>
        </select>

        <textarea name="address" placeholder="Address" required></textarea>
        <input type="text" name="area" placeholder="Area" required>
        <input type="text" name="contact_number" placeholder="Contact Number" required>
        <input type="text" name="opening_hours" placeholder="Opening Hours" required>

        <button type="submit">Add Centre</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>