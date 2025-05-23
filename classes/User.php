<?php
//User class with login and registering function.
require_once 'Database.php';
class User 
{
    private $conn;
    private $table = "users";

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function register($username, $password) 
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $key = openssl_encrypt($password, 'AES-128-ECB', $password);

        $query = "INSERT INTO " . $this->table . " (username, password_hash, encryption_key) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$username, $passwordHash, $key]);
    }

    public function login($username, $password) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }
}
?>
