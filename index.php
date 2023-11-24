<?php

require_once "./controllers/LoginController.php";
require_once "./controllers/LogoutController.php";
require_once "./controllers/AdminController.php";
require_once "./controllers/AlumnoController.php";
require_once "./controllers/MaestroController.php";

$loginController = new LoginController();
$logoutController = new LogoutController();
$adminController = new AdminController();
$maestroController = new MaestroController();
// $alumnoController = new AlumnoController();

$route = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "POST") {
    switch ($route) {
        case '/login';
            $loginController->rol($_POST);
            break;

        case '/permisos':
            $adminController->dashboard();
            break;
        case '/permisos/edit':
            $adminController->editPermisos($_POST);
            break;

        case '/maestro':
            $maestroController->dashboard();
            break;
        case '/maestros':
            $adminController->dashboardMaestros();
            break;
        case '/maestros/edit':
            $adminController->editMaestros($_POST);
            break;
        case '/maestros/create':
            $adminController->createMaestros($_POST);
            break;
        case '/alumnos':
            $adminController->dashboardAlumnos();
            break;
        case '/alumnos/edit':
            $adminController->editAlumnos($_POST);
            break;
        case '/alumnos/create':
            $adminController->createAlumnos($_POST);
            break;
        case '/clases':
            $adminController->dashboardClases();
            break;
        case '/clases/edit':
            $adminController->edtiClases($_POST);
            break;
        case '/clases/create':
            $adminController->createClases($_POST);
            break;
        case '/maestro/alumnos':
            $maestroController->dashboardAlumnos();
            break;
        case '/calificaciones/edit':
            $maestroController->editCalificaciones($_POST);
        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route) {
        case '/index.php':
            $loginController->index();
            break;

        case '/logout':
            $logoutController->logout();
            break;

        case '/admin':
            $adminController->dashboard();
            break;
        case '/maestro':
            $maestroController->dashboardAlumnos();
            break;
        case '/admin/maestros':
            $adminController->dashboardMaestros();
            break;
        case '/admin/alumnos':
            $adminController->dashboardAlumnos();
            break;
        case '/admin/clases':
            $adminController->dashboardClases();
        case '/maestro/calificaciones':
            $maestroController->dashboard();
            break;


        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}
