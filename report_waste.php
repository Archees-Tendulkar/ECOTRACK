<?php
include("includes/user_session.php");
include("includes/header.php");
?>

<div class="form-container">
    <h2>Report Waste</h2>
    <form action="submit_report.php" method="POST" enctype="multipart/form-data">
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

        <input type="text" name="location" placeholder="Location" required>
        <textarea name="description" placeholder="Describe the waste issue" required></textarea>
        <input type="file" name="image">
        <button type="submit">Submit Report</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>