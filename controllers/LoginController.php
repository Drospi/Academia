<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Admin.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Alumno.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Maestro.php";

class LoginController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }
    public function index()
    {
        $contra= 'alumno';
        $hash = password_hash($contra, PASSWORD_DEFAULT);
        var_dump($hash);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    }
    public function rol($data)
    {
        $rol = $this->model->rol($data['email']);
        $password = $this->model->password($data['email']);
        $nombre = $this->model->name($data['email']);
        $id = $this->model->id($data['email']);
        $materia = $this->model->materia($id['id']);
        session_start();
        if (password_verify($data['password'], $password['password'])) {
            if($rol['rol']==1){
                $url = "/admin".'?'. http_build_query($nombre);
                $_SESSION['rol']='admin';
                header("Location: ".$url);
            }else if($rol['rol']==2){
                $_SESSION['rol']='maestro';
                $_SESSION['id']=$id['id'];
                $_SESSION['nombre']=$nombre['name'];
                $_SESSION['materia']=$materia['materia'];
                $_SESSION['id_materia']=$materia['id'];
                header("Location: /maestro");
            }else if($rol['rol']==3){
                $_SESSION['rol']='alumno';
                $_SESSION['nombre'] = $nombre['name'];
                $_SESSION['id'] = $id['id'];
                header('Location: /alumno');
            }

        } else {
            echo 'Contra Incorrecta';
        }
        
    }
}
?>