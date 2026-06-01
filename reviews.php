<?php
include 'database.php';
$result = $conn->query("SELECT r.review_text, r.rating, r.category, r.created_at FROM reviews r ORDER BY r.created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Reviews</title>
    <style>
        body {
            background: #fffdf5;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .review-box {
            background-color: #f8f8f8;
            margin: 15px auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .rating {
            font-weight: bold;
            color: #ff9900;
        }
        .category {
            font-style: italic;
            color: #666;
        }
        .timestamp {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h2>All Anonymous Reviews</h2>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="review-box">
            <p><?= htmlspecialchars($row['review_text']) ?></p>
            <p class="rating">Rating: <?= $row['rating'] ?>/5</p>
            <p class="category">Category: <?= $row['category'] ?></p>
            <p class="timestamp">Posted on: <?= $row['created_at'] ?></p>
        </div>
    <?php } ?>
</body>
</html>

