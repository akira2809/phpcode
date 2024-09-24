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
            $this->logError($e->getMessage());
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->conn;
    }

    public function selectAll($table) {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $table)) {
            throw new Exception("Invalid table name");
        }
        
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            $this->logError($e->getMessage());
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    public function selectOne($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    public function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            $this->logError($e->getMessage());
            throw new Exception("Error: " . $e->getMessage());
        }
    }
    function query($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        // $this->conn = null;
        return $stmt;
    }
    private function logError($message) {
        // Ghi lỗi vào tệp log hoặc hệ thống log
        file_put_contents('error_log.txt', $message.PHP_EOL, FILE_APPEND);
    }

    public function __destruct() {
        $this->conn = null;
    }
    function insert($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt = $stmt->execute($params);
            return $this->conn->lastInsertId();
        } catch(PDOException $e) {
            $this->logError($e->getMessage());
            throw new Exception("Error: " . $e->getMessage());
        }

    }
}
