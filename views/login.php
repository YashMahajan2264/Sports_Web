<?php
// Check if the 'username' query parameter exists in the URL
$usernamePrefill = isset($_GET['username']) ? $_GET['username'] : '';
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
            <p>Don't have an account? <a href="#" id="open-signup">Sign up</a></p>
        </form>
    </div>

    <!-- Signup Modal -->
    <div class="modal" id="signup-modal">
        <div class="modal-content">
            <span class="close" id="close-signup">&times;</span>
            <form action="../controllers/SignupController.php" method="POST" class="signup-form">
                <h2>Sign Up</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
