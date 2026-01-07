<?php
// config/db.php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "careerniti";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            error_log("Connection failed: " . $this->conn->connect_error);
            die("Connection failed. Please try again later.");
        }
        
        // Set charset to UTF-8
        $this->conn->set_charset("utf8mb4");
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
