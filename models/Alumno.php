<?php
class Alumno{
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
    public function materias(){
        $res = $this->db->query("SELECT * FROM materias");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function all($id_materia){
        $res = $this->db->query("SELECT *
        FROM usuarios
        inner join clases on usuarios.id = clases.id_usuario
        INNER JOIN materias ON materias.id = clases.id_materia
        where usuarios.rol =3
        and clases.id_materia = $id_materia
        GROUP by id_clases , usuarios.rol, usuarios.name, clases.id_materia ;");
        $data = $res->fetch_all(MYSQLI_ASSOC);
    return $data;
    }
    public function calificaciones(){
        $res =$this->db->query("SELECT * from calificaciones");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}
?>