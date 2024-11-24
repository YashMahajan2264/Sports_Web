<?php
require_once '../classes/Database.php';
require_once '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = (new Database())->connect();
    $user = new User($db);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Call register method
    if ($user->register($username, $email, $phone, $password)) {
        // Redirect to login page with username prefilled
        header("Location: ../views/login.php?username=" . urlencode($username));
        exit;  // Make sure no further code is executed
    } else {
        echo "Error in registration.";
    }
}
?>
