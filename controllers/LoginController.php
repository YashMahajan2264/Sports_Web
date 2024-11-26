<?php

session_start();

require_once '../classes/Database.php'; 
require_once '../classes/Auth.php';  

$db = new Database();
$auth = new Auth($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Username and password are required.';
        echo "<script>alert('Username and password are required.'); window.location.href = '../views/login.php';</script>";
        exit();
    }

    $user = $db->getUserByUsername($username);

    if (!$user) {
        $_SESSION['error'] = 'Invalid username or password.';
        echo "<script>alert('Invalid username or password.'); window.location.href = '../views/login.php';</script>";
        exit();
    }

    // Verify the password
    if (password_verify($password, $user['password_hash'])) { 

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'sport' => $user['sport'] 
        ];
        $_SESSION['cricket'] = ($user['sport'] === 'cricket') ? true : false;
        $_SESSION['football'] = ($user['sport'] === 'football') ? true : false;

        if (empty($user['sport'])) {
            $_SESSION['cricket'] = false;
            $_SESSION['football'] = false;
        }

        $_SESSION['loggedin'] = true; 

        header('Location: ../views/index.php');
        exit();
    } else {
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
