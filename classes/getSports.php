<?php

require_once 'Database.php';

try {
    $database = new Database();
    $conn = $database->connect();

    // Query to count users by sport field
    $query = "SELECT 
                CASE 
                    WHEN sport IS NULL OR sport = '' THEN 'Not Selected'
                    ELSE sport
                END AS sport,
                COUNT(*) AS count 
              FROM users 
              GROUP BY sport";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch (PDOException $e) {
    // Handle errors
    echo json_encode(['error' => $e->getMessage()]);
}
?>
