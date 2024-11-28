<?php

include_once 'Database.php';


$db = new Database();
$conn = $db->connect();

try {
    
    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch data as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
