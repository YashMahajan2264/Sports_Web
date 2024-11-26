<?php
require_once '../classes/Database.php';
require_once '../classes/User.php';

$db = (new Database())->connect();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'checkField') {
    $field = $_POST['field'];
    $value = $_POST['value'];

    $exists = $user->checkFieldExists($field, $value);

    echo json_encode(['exists' => $exists]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if ($user->register($username, $email, $phone, $password)) {
        // Redirect to login.php and pass username via POST
        session_start();
        $_SESSION['prefill_username'] = $username; 
        header("Location: ../views/login.php");
        exit();
    } else {
        echo "Error in registration.";
    }
}

?>
