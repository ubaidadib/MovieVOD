<?php


class connect{
  
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "moviesvod";
    private $conn;

    public function __construct() {
        
    $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database)or die("MySQL Connection Error");
}
    public function getConn(){
        
        return $this->conn;
        
    }
    
}