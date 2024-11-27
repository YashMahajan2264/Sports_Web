<?php
session_start();

// Check if there is any error message from the session
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']); // Clear the error message after showing it
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets_/css/style.css">
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <form action="../controllers/LoginController.php" method="POST" class="login-form">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>

    <script>
        // Check if it's the user's first visit and pre-fill the username
        document.addEventListener('DOMContentLoaded', function() {
            const isFirstVisit = localStorage.getItem('isFirstVisit');
            if (isFirstVisit === 'true') {
                const savedUsername = localStorage.getItem('username');
                if (savedUsername) {
                    const usernameField = document.getElementsByName('username')[0];
                    usernameField.value = savedUsername; 
                }
                // Remove the flag
                localStorage.removeItem('isFirstVisit');
            }
        });

        <?php if (isset($errorMessage)): ?>
            // Show SweetAlert error message if there was a session error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?php echo $errorMessage; ?>',
            });
        <?php endif; ?>
    </script>
</body>

</html>
