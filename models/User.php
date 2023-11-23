<?php

class User
{
    
    private $db;
    

    public function __construct()
    {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

        try {
            $this->db = new mysqli(
                $config["host"],
                $config["username"],
                $config["password"],
                $config["dbname"]
            );
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function rol($correo){
        $r = $this->db->query("SELECT rol FROM usuarios WHERE email='$correo' ");
        $data = $r->fetch_assoc();

        return $data;
        
    }
    public function password($correo){
        $r = $this->db->query("SELECT password FROM usuarios WHERE email='$correo' ");
        $data = $r->fetch_assoc();

        return $data;
        
    }
    public function name($correo){
        $r = $this->db->query("SELECT name FROM usuarios WHERE email='$correo' ");
        $data = $r->fetch_assoc();

        return $data;
        
    }

}