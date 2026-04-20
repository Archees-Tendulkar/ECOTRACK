<?php
include("includes/db_connect.php");
include("includes/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        $_SESSION["admin_id"] = $admin["admin_id"];
        $_SESSION["admin_username"] = $admin["username"];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid admin credentials'); window.location.href='admin_login.php';</script>";
    }
}
?>

<div class="form-container glass-card">
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Admin Username" required>
        <input type="password" name="password" placeholder="Admin Password" required>
        <button type="submit">Login as Admin</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>