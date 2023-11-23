<?php
class Admin{
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
    
    public function all($rol){
        if($rol == 0){
            $res = $this->db->query("SELECT * FROM usuarios ");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        }else{
        $res = $this->db->query("SELECT * FROM usuarios WHERE rol = $rol");
        $data = $res->fetch_all(MYSQLI_ASSOC);
    }
    return $data;
    }

    public function editPermisos($data){
        $email = $data['email'];
        $rol = $data['rol'];
        $id = $data['id'];
        $this->db->query("UPDATE usuarios SET email = '$email', rol = '$rol' WHERE id = '$id'");
    }
    public function materias(){
        $res = $this->db->query("SELECT * FROM materias");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function clases(){
        $res = $this->db->query("SELECT clases.id_materia, clases.id_usuario, clases.id_clases, materias.id, materias.materia, usuarios.name
        FROM clases
        INNER JOIN materias ON materias.id = clases.id_materia
        LEFT JOIN usuarios ON usuarios.id = clases.id_usuario AND usuarios.rol = 2
        GROUP BY clases.id_materia, clases.id_usuario, clases.id_clases, materias.id, materias.materia, usuarios.name;
        
        ");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function alumnosInscritos(){
        $res =$this->db->query("SELECT materias.materia, materias.id, 
        COUNT(CASE WHEN usuarios.rol = 3 THEN 1 ELSE NULL END) AS alumnos_inscritos
 FROM clases
 INNER JOIN materias ON materias.id = clases.id_materia
 INNER JOIN usuarios ON usuarios.id = clases.id_usuario
 WHERE usuarios.rol = 3
 GROUP BY materias.materia, materias.id;
 ");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function editMaestros($data){
        $name = $data['name'];
        $adress = $data['adress'];
        $born_date = $data['born_date'];
        $materia = $data['materia'];
        $id = $data['id'];
        $this->db->query("UPDATE usuarios SET name = '$name', adress = '$adress', born_date = '$born_date' WHERE id = '$id'");
        $this->db->query("UPDATE clases SET id_materia = $materia WHERE id_usuario = '$id'");
    }
    public function createMaestros($data){
        $name = $data['name'];
        $email = $data['email'];
        $adress = $data['adress'];
        $born_date = $data['born_date'];
        $materia = $data['materia'];
        $contra = $data['password'];
        $hash = password_hash($contra, PASSWORD_DEFAULT);
        $this->db->begin_transaction();
        try{
            $tr1 = $this->db->prepare("INSERT INTO usuarios (name,email,adress,born_date,rol,password) VALUES ('$name','$email','$adress','$born_date',2,'$hash')");
            $tr1->execute();

            $ultimoId = $this->db->insert_id;

            $tr2 = $this->db->prepare("INSERT INTO clases (id_usuario, id_materia) VALUES ($ultimoId, $materia)");
            $tr2->execute();
            $this->db->commit();
        }catch (mysqli_sql_exception $e) {
            // En caso de error, revertir la transacción
            $this->db->rollback();
            // Manejar el error, registrar o mostrar un mensaje de error
            echo "Error: " . $e->getMessage();
        }
    }
    public function editAlumnos($data){
        $DNI = $data['DNI'];
        $name = $data['name'];
        $adress = $data['adress'];
        $born_date = $data['born_date'];
        $id = $data['id'];
        $this->db->query("UPDATE usuarios SET name = '$name', DNI = '$DNI', adress = '$adress', born_date = '$born_date' WHERE id = '$id'");
    }
    public function createAlumnos($data){
        $DNI = $data['DNI'];
        $name = $data['name'];
        $email = $data['email'];
        $adress = $data['adress'];
        $born_date = $data['born_date'];
        $contra = $data['password'];
        $hash = password_hash($contra, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO usuarios (name,email,adress,born_date,rol,password,DNI) VALUES ('$name','$email','$adress','$born_date',3,'$hash',$DNI)");
    }
    public function editClases($data){
        $name = $data['name'];
        $id_maestro = $data['maestro'];
        $id = $data['id'];
        $id_materia = $data['id_materia'];
        try{
        $this->db->query("UPDATE clases SET id_usuario = $id_maestro WHERE id_clases = $id");
        $this->db->query("UPDATE materias SET materia = '$name' WHERE id = $id_materia");
    }catch (mysqli_sql_exception $e) {
        // En caso de error, revertir la transacción
        $this->db->rollback();
        // Manejar el error, registrar o mostrar un mensaje de error
        echo "Error: " . $e->getMessage();
    }
    }
    public function createClases($data){
        $name = $data['name'];
        $maestro = $data['maestro'];
        try{
        $this->db->query("INSERT INTO materias (materia) Values ('$name')");
        $ultimoId = $this->db->insert_id;
        $this->db->query("INSERT INTO clases (id_usuario,id_materia) VALUES ($maestro,$ultimoId) ");
    }catch (mysqli_sql_exception $e) {
        // En caso de error, revertir la transacción
        $this->db->rollback();
        // Manejar el error, registrar o mostrar un mensaje de error
        echo "Error: " . $e->getMessage();
    }

    }
    
}
?>
