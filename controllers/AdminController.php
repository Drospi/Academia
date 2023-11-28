<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Admin.php";

class AdminController{
    protected $model;

    public function __construct()
    {
        $this->model = new Admin;
    }
    //Pagina permisos del admin
    public function dashboard(){
        $nombre= $_GET['name'];
        $usuarios = $this->model->all(0);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/admin_dashboard.php";
    }
    public function editPermisos($data){
        $this->model->editPermisos($data);
        header('Location: /admin');
    }
    //Pagina maestros del admin
    public function dashboardMaestros(){
        $nombre= $_GET['name'];
        $usuarios = $this->model->all(2);
        $materias = $this->model->materias();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/admin_dashboard.php";
    }
    public function editMaestros($data){
        $this->model->editMaestros($data);
        header('Location: /admin/maestros');
    }
    public function createMaestros($data){
        var_dump($data);
        $this->model->createMaestros($data);
        header('Location: /admin/maestros');
    }
    public function deleteMaestros($data){
        $this->model->deleteMaestros($data);
        header('Location: /admin/maestros');
    }

    // Pagina alumnos del admin
    public function dashboardAlumnos(){
        $nombre= $_GET['name'];
        $usuarios = $this->model->all(3);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/admin_dashboard.php";
    }
    public function editAlumnos($data){
        $this->model->editAlumnos($data);
        header('Location: /admin/alumnos');
    }
    public function createAlumnos($data){
        $this->model->createAlumnos($data);
        header('Location: /admin/alumnos');
    }
    public function deleteAlumnos($data){
        $this->model->deleteAlumnos($data);
        header('Location: /admin/alumnos');
    }

    //pagina clases del admin
    public function dashboardClases(){
        $nombre= $_GET['name'];
        $materias = $this->model->clases();
        $usuarios = $this->model->all(2);
        $inscritos = $this->model->alumnosInscritos();
        include $_SERVER["DOCUMENT_ROOT"] . '/views/admin/admin_dashboard.php';
    }
    public function edtiClases($data){
        $this->model->editClases($data);
        header('Location: /admin/clases');
    }
    public function createClases($data){
        $this->model->createClases($data);
        header('Location: /admin/clases');
    }
    public function deleteClases($data){
        $this->model->deleteClases($data);
        header('Location: /admin/clases');
    }
    
}
?>