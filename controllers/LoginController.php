<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../classes/Database.php';  // Ensure this file exists and is correct
require_once '../classes/Auth.php';      // Ensure this file exists and is correct

$db = new Database();
$auth = new Auth($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted login data
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    // Debugging: Check form data
    var_dump("Form submitted:", $username, $password);

    // Server-side validation: ensure both fields are filled
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Username and password are required.';
        echo "<script>alert('Username and password are required.'); window.location.href = '../views/login.php';</script>";
        exit();
    }

    // Check if the username exists in the database
    $user = $db->getUserByUsername($username);  // Ensure this function exists and works correctly

    // Debugging: Inspect database query result
    echo "<pre>";
    var_dump("User fetched from DB:", $user);
    echo "</pre>";

    if (!$user) {
        $_SESSION['error'] = 'Invalid username or password.';
        echo "<script>alert('Invalid username or password.'); window.location.href = '../views/login.php';</script>";
        exit();
    }

    // Validate the password (assuming password_hash was used)
    if (password_verify($password, $user['password_hash'])) { // Use 'password_hash' field from DB
        // Debugging: Confirm successful login
        var_dump("Password verified!");

        // Store user info in session after successful login
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];

        // Redirect to index.php (after successful login)
        header('Location: ../views/index.php');
        exit();
    } else {
        // Debugging: Password verification failed
        var_dump("Password verification failed!");

        $_SESSION['error'] = 'Invalid username or password.';
        echo "<script>alert('Invalid username or password.'); window.location.href = '../views/login.php';</script>";
        exit();
    }
} else {
    // If form is not submitted, redirect back to the login page
    header('Location: ../views/login.php');
    exit();
}
?>
