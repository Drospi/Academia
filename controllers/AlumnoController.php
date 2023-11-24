<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Alumno.php";
class AlumnoController{
    protected $model;

    public function __construct()
    {
        $this->model = new Alumno;
    }
    public function dashboard(){
        $nombre= $_GET['name'];
        $materias = $this->model->materias();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumnos/alumno_dashboard.php";
    }
    public function dashboardClases(){
        session_start();
        $nombre= $_GET['name'];
        $usuarios = $this->model->all($_SESSION['id_materia']);
        $calificaciones = $this->model->calificaciones();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumnos/alumno_dashboard.php";
    }
}
?>