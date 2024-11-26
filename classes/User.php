<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $phone, $password, $sport = null) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert query including the optional sport field
        $query = "INSERT INTO users (username, email, phone_number, password_hash, sport) 
                  VALUES (:username, :email, :phone, :password_hash, :sport)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':sport', $sport); // Can be NULL if no sport is selected

        return $stmt->execute();
    }

    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        } else {
            return false;
        }
    }

    // To check if a field exists in the database
    public function checkFieldExists($field, $value) {
        $query = "SELECT COUNT(*) as count FROM users WHERE $field = :value";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0; 
    }
}
?>
