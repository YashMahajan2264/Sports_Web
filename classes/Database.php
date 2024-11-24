<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'UserManagement';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Establish database connection
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }

    // Fetch user by username
    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Return the user data
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
