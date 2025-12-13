<?php
// File: class/Database.php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    public $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi Database Gagal: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        global $config; 
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql) 
    { 
        return $this->conn->query($sql); 
    } 

    public function get($table, $where) 
    { 
        $sql = "SELECT * FROM " . $table . " WHERE " . $where; 
        $result = $this->conn->query($sql); 
        if ($result && $result->num_rows > 0) {
             return $result->fetch_assoc(); 
        }
        return false;
    } 

    // FUNGSI INSERT (CREATE) - KRITIS
    public function insert($table, $data) 
    { 
        if (!is_array($data) || empty($data)) return false;

        $column = [];
        $value = [];
        
        foreach ($data as $key => $val) { 
            $column[] = $key; 
            // Menggunakan real_escape_string dan kutip tunggal
            $value[] = "'" . $this->conn->real_escape_string($val) . "'";
        } 

        $columns = implode(",", $column); 
        $values  = implode(",", $value); 
        
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")"; 
        return $this->conn->query($sql); 
    } 

    // FUNGSI UPDATE (UPDATE)
    public function update($table, $data, $where) 
    { 
        if (!is_array($data) || empty($data)) return false;

        $update_value = []; 
        
        foreach ($data as $key => $val) { 
            // Menggunakan real_escape_string
            $update_value[] = "$key='" . $this->conn->real_escape_string($val) . "'"; 
        } 

        $update_value = implode(",", $update_value); 

        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where; 
        return $this->conn->query($sql); 
    } 
} 
?>