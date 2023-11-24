<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Alumno.php";
class AlumnoController{
    protected $model;

    public function __construct()
    {
        $this->model = new Alumno;
    }
    public function dashboard(){
        session_start();
        $materias = $this->model->materias($_SESSION['id']);
        $clasesInscritas = $this->model->clases();
        $clasesNoInscritas = $this->model->clasesNo();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumnos/alumno_dashboard.php";
    }
    public function dashboardCalificaciones(){
        session_start();
        $nombre= $_GET['name'];
        $materias = $this->model->materias($_SESSION['id']);
        $clasesInscritas = $this->model->clases();
        $clasesNoInscritas = $this->model->clasesNo();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumnos/alumno_dashboard.php";
    }
    public function dashboardClases(){
        session_start();
        $nombre= $_GET['name'];
        $materias = $this->model->materias($_SESSION['id']);
        $clasesInscritas = $this->model->clases();
        $clasesNoInscritas = $this->model->clasesNo();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/alumnos/alumno_dashboard.php";
    }
    public function inscribir($data){
        $this->model->inscribir($data);
        header("Location: /alumno");
    }
    public function baja($data){
        $this->model->baja($data);
        header("Location: /alumno");
    }
}
?>