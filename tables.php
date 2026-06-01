<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "review_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Users Table
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    anonymous_id VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql_users) === TRUE) {
    echo "Users table created successfully.<br>";
} else {
    echo "Error creating users table: " . $conn->error . "<br>";
}

// Reviews Table
$sql_reviews = "CREATE TABLE IF NOT EXISTS reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    review_text TEXT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    category ENUM('Staff', 'Faculty', 'Student') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_flagged BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
)";
if ($conn->query($sql_reviews) === TRUE) {
    echo "Reviews table created successfully.<br>";
} else {
    echo "Error creating reviews table: " . $conn->error . "<br>";
}

// Flags Table (Renamed from 'flag' to 'flags' to avoid reserved words)
$sql_flags = "CREATE TABLE IF NOT EXISTS flags (
    flag_id INT PRIMARY KEY AUTO_INCREMENT,
    review_id INT,
    user_id INT,
    reason TEXT NOT NULL,
    flagged_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (review_id) REFERENCES reviews(review_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
)";
if ($conn->query($sql_flags) === TRUE) {
    echo "Flags table created successfully.<br>";
} else {
    echo "Error creating flags table: " . $conn->error . "<br>";
}

$conn->close();
?>
