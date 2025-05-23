<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Manager</title>
</head>
<body>
    <h1>PHP OOP Password Manager</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <a href="public/dashboard.php">Go to Dashboard</a><br>
        <a href="public/logout.php">Logout</a>
    <?php else: ?>
        <a href="public/register.php">Register</a><br>
        <a href="public/login.php">Login</a>
    <?php endif; ?>
</body>
</html>
