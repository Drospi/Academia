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
        $contra= 'rio';
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
        session_start();
        if (password_verify($data['password'], $password['password'])) {
            if($rol['rol']==1){
                $url = "/admin".'?'. http_build_query($nombre);
                $_SESSION['rol']='admin';
                header("Location: ".$url);
            }else if($rol['rol']==2){
                $_SESSION['rol']='maestro';
                $_SESSION['id']=$id['id'];
                header("Location: /maestro");
            }else if($rol['rol']==3){
                $_SESSION['rol']='alumno';
                include $_SERVER["DOCUMENT_ROOT"] . "/views/alumnos/alumno_dashboard.php";
            }

        } else {
            echo 'Contra Incorrecta';
        }
        
    }
}
?>