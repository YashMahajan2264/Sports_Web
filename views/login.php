<?php
session_start();
$usernamePrefill = isset($_SESSION['prefill_username']) ? $_SESSION['prefill_username'] : '';
unset($_SESSION['prefill_username']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets_/css/style.css">
    <script src="../assets_/js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <form action="../controllers/LoginController.php" method="POST" class="login-form">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($usernamePrefill); ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
