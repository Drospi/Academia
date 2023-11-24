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
    public function materias($id){
        $res = $this->db->query("SELECT *  from calificaciones
        inner join usuarios on usuarios.id  = calificaciones.id_usuario
        inner join materias on materias.id = calificaciones.id_materia 
                where calificaciones.id_usuario = $id");
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
    public function clases(){
        $res =$this->db->query("SELECT *  from clases
        inner join materias on id_materia = materias.id 
        where clases.id_usuario = 27");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function clasesNo(){
        $res = $this->db->query("SELECT materias.id, materia
        FROM materias
        LEFT JOIN clases ON materias.id = clases.id_materia AND clases.id_usuario = 27
        WHERE clases.id_clases IS NULL;");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function inscribir($data){
        $id_materias = $data['opciones'];
        $id_usuario = $data['id_usuario'];
        try{
        foreach($id_materias as $id_materia){
            $this->db->query("INSERT INTO clases (id_materia,id_usuario) VALUES ($id_materia, $id_usuario)");
        }
    }catch (mysqli_sql_exception $e) {
        // En caso de error, revertir la transacción
        $this->db->rollback();
        // Manejar el error, registrar o mostrar un mensaje de error
        echo "Error: " . $e->getMessage();
    }

    }
    public function baja($data){
        $id_usuario = $data['id_usuario'];
        $id_materia = $data['id_materia'];
        $this->db->query("DELETE from clases where id_usuario=$id_usuario and id_materia=$id_materia ");
        $this->db->query("DELETE from calificaciones where id_usuario=$id_usuario and id_materia=$id_materia");
    }
}
?>