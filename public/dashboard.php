<?php
require_once '../classes/Database.php';
require_once '../classes/PasswordGenerator.php';
require_once '../classes/Encryption.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$generatedPassword = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate'])) {
    $length = (int) $_POST['length'];
    $upper = (int) $_POST['upper'];
    $lower = (int) $_POST['lower'];
    $num = (int) $_POST['num'];
    $special = (int) $_POST['special'];

    $generatedPassword = PasswordGenerator::generate($length, $upper, $lower, $num, $special);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <h3>Generate Password</h3>
    <form method="POST">
        Length: <input type="number" name="length" required><br>
        Uppercase Letters: <input type="number" name="upper" required><br>
        Lowercase Letters: <input type="number" name="lower" required><br>
        Numbers: <input type="number" name="num" required><br>
        Special Characters: <input type="number" name="special" required><br>
        <button type="submit" name="generate">Generate</button>
    </form>

    <?php if (!empty($generatedPassword)): ?>
        <p><strong>Generated Password:</strong> <?php echo $generatedPassword; ?></p>
        <form action="save_password.php" method="POST">
            Service Name: <input type="text" name="service" required>
            <input type="hidden" name="password" value="<?php echo $generatedPassword; ?>">
            <button type="submit">Save Password</button>
        </form>
    <?php endif; ?>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
