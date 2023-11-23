<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Maestro.php";
class MaestroController{
    protected $model;

    public function __construct()
    {
        $this->model = new Maestro;
    }
    public function dashboard(){
        $nombre= $_GET['name'];
        $usuarios = $this->model->all(0);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/maestro/maestro_dashboard.php";
    }
    public function dashboardAlumnos(){
        session_start();
        
        $nombre= $_GET['name'];
        $id_materia = $this->model->idMateria($_SESSION['id']);
        $usuarios = $this->model->all($id_materia);
        $calificaciones = $this->model->calificaciones();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/maestro/maestro_dashboard.php";
    }
    public function editCalificaciones($data){
        $this->model->editCalificaciones($data);
        header("Location: /maestro");
    }
}
?>