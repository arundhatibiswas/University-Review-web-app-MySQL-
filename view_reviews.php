<?php
include 'database.php';
$result = $conn->query("SELECT review_text, rating, category FROM reviews");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Reviews</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>All Reviews</h2>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="review-box">
            <p><strong><?php echo $row['category']; ?></strong>: <?php echo $row['review_text']; ?> (Rating: <?php echo $row['rating']; ?>)</p>
        </div>
    <?php endwhile; ?>
</body>
</html>
