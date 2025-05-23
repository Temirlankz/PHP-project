<?php
class Database {
    private $host = "localhost";         
    private $db_name = "password_manager"; 
    private $username = "root";          
    private $password = "";              
    public $conn;                         

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "<strong>Database Error:</strong> " . $e->getMessage();
            exit();
        }

        return $this->conn;
    }
}
?>
