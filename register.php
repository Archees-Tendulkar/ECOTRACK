<?php include("includes/header.php"); ?>

<div class="form-container">
    <h2>User Registration</h2>
    <form action="register_process.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <button type="submit">Register</button>
    </form>
    <p class="form-link">Already have an account? <a href="login.php">Login here</a></p>
</div>

<?php include("includes/footer.php"); ?>