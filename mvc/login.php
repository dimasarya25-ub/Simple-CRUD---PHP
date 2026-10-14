<?php
session_start();

if (isset($_SESSION['jabatan'])) {
    header("Location: index.php");
    exit;
}

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login BEM</title>
</head>
<body>
    <h2>Login Pengurus BEM</h2>

    <?php if ($error != ''): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form action="proses_login.php" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required>
        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>