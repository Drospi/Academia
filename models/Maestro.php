<?php
class Maestro{
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
    public function idMateria($data){
        $r =$this->db->query("SELECT * from clases where id_usuario=$data");
        $d = $r->fetch_assoc();
        $id_materia = $d['id_materia'];
        return $id_materia;

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
    public function editCalificaciones($data)
    {
        $mensaje = $data['mensaje'];
        $calificacion = $data['calificacion'];
        $id_usuario = $data['id_usuario'];
        $id = $data['id'];
        try{
        if($data['id']==NULL){
            $this->db->query("INSERT into calificaciones (calificacion,id_usuario, mensajes) VALUES ($calificacion, '$mensaje',$id_usuario)");
            echo"se inserto";
        }else{
            $this->db->query("UPDATE calificaciones set calificacion = $calificacion, mensajes = '$mensaje', id_usuario= $id_usuario WHERE id=$id");
            echo"se actualizo";
        }
    }catch (mysqli_sql_exception $e) {
        // En caso de error, revertir la transacción
        $this->db->rollback();
        // Manejar el error, registrar o mostrar un mensaje de error
        echo "Error: " . $e->getMessage();
    }
    }
}
?>