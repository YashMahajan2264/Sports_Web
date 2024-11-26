<?php

session_start();

require_once '../classes/Database.php';  // Ensure this file exists and is correct
require_once '../classes/Auth.php';      // Ensure this file exists and is correct

$db = new Database();
$auth = new Auth($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted login data
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    
    var_dump("Form submitted:", $username, $password);

    // Server-side validation: ensure both fields are filled
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Username and password are required.';
        echo "<script>alert('Username and password are required.'); window.location.href = '../views/login.php';</script>";
        exit();
    }


    $user = $db->getUserByUsername($username); 

   
    echo "<pre>";
    var_dump("User fetched from DB:", $user);
    echo "</pre>";

    if (!$user) {
        $_SESSION['error'] = 'Invalid username or password.';
        echo "<script>alert('Invalid username or password.'); window.location.href = '../views/login.php';</script>";
        exit();
    }

  
    if (password_verify($password, $user['password_hash'])) { // Use 'password_hash' field from DB
       
        var_dump("Password verified!");

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];
        
        $_SESSION['loggedin'] = true; 

        header('Location: ../views/index.php');
        exit();
    } else {
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
