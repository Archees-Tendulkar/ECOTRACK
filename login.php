<?php include("includes/header.php"); ?>

<div class="form-container">
    <h2>User Login</h2>
    <form action="login_process.php" method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="form-link">Don’t have an account? <a href="register.php">Register here</a></p>
</div>

<?php include("includes/footer.php"); ?>