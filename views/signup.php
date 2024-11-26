<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets_/css/style.css">
    <script src="../assets_/js/signup-validation.js" defer></script> <!-- Updated script -->
</head>
<body>
    <div class="container">
        <form id="signup-form" action="../controllers/SignupController.php" method="POST" class="signup-form">
            <h2>Sign Up</h2>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <small id="username-error" class="error-message"></small>

            <input type="email" id="email" name="email" placeholder="Email" required>
            <small id="email-error" class="error-message"></small>

            <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
            <small id="phone-error" class="error-message"></small>

            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" id="submit-button" disabled>Sign Up</button> <!-- Button initially disabled -->
        </form>
    </div>
</body>
</html>
