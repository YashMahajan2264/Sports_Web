<?php
class Auth {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Server-side validation for login
    public function login($username, $password) {
        // Hash password before checking it (for security)
        $password = md5($password); // Use more secure hashing like bcrypt in production

        // Prepare SQL query to fetch user data
        $query = "SELECT * FROM users WHERE username = :username AND password_hash = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // Redirect to the user dashboard
        } else {
            return "Invalid username or password!";
        }
    }

    // Register a new user
    public function register($username, $email, $phone, $password) {
        // Hash password before storing (for security)
        $password = md5($password); // Use more secure hashing like bcrypt in production

        // Check if the username or email already exists
        $query = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "Username or Email already exists!";
        }

        // Insert the new user into the database
        $query = "INSERT INTO users (username, email, phone_number, password_hash) VALUES (:username, :email, :phone, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return "User registered successfully!";
    }
}
?>
