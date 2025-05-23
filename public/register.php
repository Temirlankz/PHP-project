<?php
require_once '../classes/Database.php';
require_once '../classes/User.php';

session_start();

$db = new Database();
$conn = $db->getConnection();
$user = new User($conn);

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($user->register($username, $password)) {
        $message = "<span style='color: green;'>Registration successful. <a href='login.php'>Login here</a></span>";
    } else {
        $message = "<span style='color: red;'>Registration failed. Username may already exist.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>
    <p><?php echo $message; ?></p>
    <a href="login.php">Already have an account? Login</a>
</body>
</html>