<?php
include 'database.php'; // Ensure this file exists

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields
    if (!isset($_POST['review_text'], $_POST['rating'], $_POST['category'])) {
        die("Error: Missing required fields.");
    }

    $review_text = $conn->real_escape_string($_POST['review_text']);
    $rating = intval($_POST['rating']);
    $category = $_POST['category'];

    // Generate a unique anonymous ID
    $anonymous_id = uniqid("anon_");

    // Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (anonymous_id) VALUES (?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $anonymous_id);
    $stmt->execute();
    $user_id = $stmt->insert_id;
    $stmt->close();

    // Insert review
    $stmt = $conn->prepare("INSERT INTO reviews (user_id, review_text, rating, category) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("isis", $user_id, $review_text, $rating, $category);

    if ($stmt->execute()) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Anonymous Review</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Submit Your Review</h2>
    <form method="POST">
        <label>Review:</label><br>
        <textarea name="review_text" required></textarea><br>
        
        <label>Rating:</label>
        <select name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        
        <label>Category:</label>
        <select name="category">
            <option value="Staff">Staff</option>
            <option value="Faculty">Faculty</option>
            <option value="Student">Student</option>
        </select><br>
        
        <button type="submit">Submit Review</button>
    </form>
    <!-- View Reviews Button -->
    <a class="view-button" href="reviews.php">View All Reviews</a>
</body>
</html>
