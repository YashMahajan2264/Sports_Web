<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets_/css/style.css">

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
        document.addEventListener('DOMContentLoaded', function() {
            const isFirstVisit = localStorage.getItem('isFirstVisit');
            if (isFirstVisit === 'true') {
                const savedUsername = localStorage.getItem('username');
                if (savedUsername) {
                    const usernameField = document.getElementsByName('username')[0];
                    usernameField.value = savedUsername; 
                }
                //remove the flag
                localStorage.removeItem('isFirstVisit');
            }
        });
    </script>

</body>

</html>