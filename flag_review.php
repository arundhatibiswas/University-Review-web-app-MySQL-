<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review_id = $_POST['review_id'];
    $reason = $_POST['reason'];

    $stmt = $conn->prepare("INSERT INTO flag (review_id, user_id, reason) VALUES (?, NULL, ?)");
    $stmt->bind_param("is", $review_id, $reason);

    if ($stmt->execute()) {
        echo "Review flagged successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flag Review</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Flag a Review</h2>
    <form method="POST">
        <label>Review ID:</label>
        <input type="number" name="review_id" required><br>
        
        <label>Reason:</label>
        <textarea name="reason" required></textarea><br>
        
        <button type="submit">Flag Review</button>
    </form>
</body>
</html>
