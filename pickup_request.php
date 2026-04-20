<?php
include("includes/user_session.php");
include("includes/header.php");
?>

<div class="form-container">
    <h2>Recycling Pickup Request</h2>
    <form action="submit_pickup.php" method="POST">
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

        <input type="text" name="quantity" placeholder="Quantity (e.g. 5 kg)" required>
        <textarea name="pickup_address" placeholder="Pickup Address" required></textarea>
        <input type="date" name="preferred_date" required>
        <button type="submit">Request Pickup</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>