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

    if ($user->login($username, $password)) {
        header('Location: dashboard.php');
        exit();
    } else {
        $message = "<span style='color: red;'>Login failed. Invalid credentials.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p><?php echo $message; ?></p>
    <a href="register.php">Don't have an account? Register</a>
</body>
</html>
