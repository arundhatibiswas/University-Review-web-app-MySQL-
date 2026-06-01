<?php
include 'database.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users - Anonymous Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f6fa;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            background-color: #28a745;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h2>Registered Anonymous Users</h2>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Anonymous ID</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['user_id']; ?></td>
                    <td><?= $row['anonymous_id']; ?></td>
                    <td><?= $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">No users found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
