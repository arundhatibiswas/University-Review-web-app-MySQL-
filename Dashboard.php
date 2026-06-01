<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anonymous Review Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 0;
        }
        header {
            background: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #f4f4f4;
            padding: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.1);
        }
        nav a {
            text-decoration: none;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: #0056b3;
        }
        .content {
            padding: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>Anonymous Review Dashboard</h1>
</header>

<nav>
    <a href="users.php">Users</a>
    <a href="reviews.php">Reviews</a>
    <a href="flag.php">Flags</a>
</nav>

<div class="content">
    <h2>Welcome to the Dashboard</h2>
    <p>Select a section from the menu to manage data.</p>
</div>

</body>
</html>
