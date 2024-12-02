<?php
 header("Access-Control-Allow-Headers: api-key, content-type");
 header("Access-Control-Allow-Origin: *");
 header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
 header("Cache-Control: post-check=0, pre-check=0", false);
 header("Pragma: no-cache");
 header('Content-Type: application/json; charset=utf-8');


include_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method. Only GET method is allowed.'
    ]);
    exit;
}

$db = new Database();
$conn = $db->connect();

try {

    $query = "SELECT id, username, email, phone_number, 
                     CASE 
                        WHEN sport IS NULL OR sport = '' THEN 'Not Selected' 
                        ELSE sport 
                     END AS sport 
              FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();


    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($users, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {

    echo json_encode([
        'success' => false,
        'message' => 'Error fetching user data.',
        'error' => $e->getMessage()
    ]);
}
