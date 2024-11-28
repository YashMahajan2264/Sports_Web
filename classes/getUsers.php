<?php

include_once 'Database.php';

// Create a new database instance
$db = new Database();
$conn = $db->connect();

try {
    // Fetch all users
    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch data as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data in JSON format
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
