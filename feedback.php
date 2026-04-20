<?php
include("includes/user_session.php");
include("includes/header.php");
?>

<div class="form-container">
    <h2>Send Feedback</h2>
    <form action="submit_feedback.php" method="POST">
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Write your feedback" required></textarea>
        <input type="number" name="rating" min="1" max="5" placeholder="Rating out of 5" required>
        <button type="submit">Submit Feedback</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>