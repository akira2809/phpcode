<?php
class ConnectModel {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $db_name = 'asm';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            $this->logError("Connection failed: " . $e->getMessage());
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public function selectAll($table) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            $this->logError("Error fetching data from $table: " . $e->getMessage());
            throw new Exception("Error fetching data from $table: " . $e->getMessage());
        }
    }

    public function selectOne($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            $this->logError("Error executing query: " . $e->getMessage());
            throw new Exception("Error executing query: " . $e->getMessage());
        }
    }

    public function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            $this->logError("Error executing query: " . $e->getMessage());
            throw new Exception("Error executing query: " . $e->getMessage());
        }
    }

    private function logError($message) {
        // Log the error to a file or error reporting system
        error_log($message, 3, 'error_log.txt');
    }

    public function __destruct() {
        $this->conn = null; // Close the database connection
    }
    
}
?>
