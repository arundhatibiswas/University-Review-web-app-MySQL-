<?php
include 'database.php';
$result = $conn->query("SELECT * FROM flags");
echo "<h2>Flags</h2>";
while ($row = $result->fetch_assoc()) {
    echo "Flag ID: " . $row['flag_id'] . " | Reason: " . $row['reason'] . "<br>";
}
?>
