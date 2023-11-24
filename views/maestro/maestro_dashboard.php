<?php
session_start();
if(!isset($_SESSION["rol"])){
    echo "Debes iniciar sesion primero";
    die();
}else if($_SESSION['rol']!='maestro'){
  echo "No eres un maestro";
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body class="flex-col h-screen bg-white">

    <nav>
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          
          <img class='h-12 w-12 rounded-full cursor-pointer' id="sidebarToggle" src='../src/img/logo.jpg'/>
          <p class="m-4">Home</p>
        </div>

      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
      <div class="relative">

        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full items-center text-sm gap-4" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <span><?php echo $_SESSION['nombre'] ?></span>
              <img class='h-12 w-12 rounded-full' src='../src/img/maestro.jpg'/>
            </button>
          </div>
          <div id="dropmenu" class="nactive-dropmenu absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="#" class="mini_icon block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-3.123 0-5.914-1.441-7.749-3.69.259-.588.783-.995 1.867-1.246 2.244-.518 4.459-.981 3.393-2.945-3.155-5.82-.899-9.119 2.489-9.119 3.322 0 5.634 3.177 2.489 9.119-1.035 1.952 1.1 2.416 3.393 2.945 1.082.25 1.61.655 1.871 1.241-1.836 2.253-4.628 3.695-7.753 3.695z"/></svg>
            Mi Perfil</a>
            <a href="#" class="mini_icon block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17.997 18h-11.995l-.002-.623c0-1.259.1-1.986 1.588-2.33 1.684-.389 3.344-.736 2.545-2.209-2.366-4.363-.674-6.838 1.866-6.838 2.491 0 4.226 2.383 1.866 6.839-.775 1.464.826 1.812 2.545 2.209 1.49.344 1.589 1.072 1.589 2.333l-.002.619zm4.811-2.214c-1.29-.298-2.49-.559-1.909-1.657 1.769-3.342.469-5.129-1.4-5.129-1.265 0-2.248.817-2.248 2.324 0 3.903 2.268 1.77 2.246 6.676h4.501l.002-.463c0-.946-.074-1.493-1.192-1.751zm-22.806 2.214h4.501c-.021-4.906 2.246-2.772 2.246-6.676 0-1.507-.983-2.324-2.248-2.324-1.869 0-3.169 1.787-1.399 5.129.581 1.099-.619 1.359-1.909 1.657-1.119.258-1.193.805-1.193 1.751l.002.463z"/></svg>
            Chat de Grupo</a>
            <hr>
            <a href="/logout" class="mini_icon red block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">
            <svg fill="red" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 22h-20v-7h2v5h16v-16h-16v5h-2v-7h20v20zm-13-11v-4l6 5-6 5v-4h-11v-2h11z"/></svg>
            Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</nav>
    <aside id="sidebar" class="z-50 bg-gray-700 absolute top-0 left-0 h-screen text-gray-300 w-1/4 transition-all -translate-x-full duration-300 ease-in-out transform ">
    <div class="p-4">
    <button onclick="cerrarSidebar()" type="button" class="relative flex mb-8 rounded-full items-center text-sm gap-4" >
    <img class='h-12 w-12 rounded-full' src='../src/img/logo.jpg'/>
        <span class="text-xl">Universidad</span>
    </button>
    <hr class="bg-gray-100" style="padding: 0.1px; width:auto;">
            <div class="my-4">
                <h2 class="text-xl">Maestro</h2>
                <p class="text-md text-gray-300"><?php echo $_SESSION['nombre'] ?></p>
            </div>
    <hr class="bg-gray-100" style="padding: 0.1px; width:auto;">
            <nav>
                <h3 class="uppercase text-center my-4">Menu Alumnos</h3>
                <ul>
                    <li class="mb-2">
                      <form action="/maestro/alumnos" method="post">
                        <input type="text" hidden name="id" value="<?php echo $_SESSION['id'] ?>">
                        <button onclick="mostrarSeccion('alumnos')" type="submit" class="flex gap-2 items-center">
                        <i class="fas fa-graduation-cap"></i> Alumnos
                        </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <section onclick="cerrarSidebar()" class="bg-gray-100 w-full h-full">
        <h1 class="text-xl p-4">Dahboard</h1>
        <div class="bg-white w-auto m-4 p-4">
            <h2>Bienvenido</h2>
            <p>Selecciona la accion que quieras realizar presionando el logo de la izquierda y escogiendo las vistas del sidebar</p>
        </div>
    </section>
    <section onclick="cerrarSidebar()" id="alumnos" class="bg-gray-100 hidden w-full h-full">
    <?php
        
          include $_SERVER["DOCUMENT_ROOT"] . "/views/maestro/maestro_alumnos.php";
        ?>
    </section>

    <script>
            document.getElementById('user-menu-button').addEventListener('click',()=>{
        document.getElementById('dropmenu').classList.toggle('nactive-dropmenu')
    })
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });
        function cerrarSidebar(){
            sidebar.classList.add('-translate-x-full');
            document.getElementById('dropmenu').classList.add('nactive-dropmenu')

        }
        if(sessionStorage.getItem('seccion')){
            mostrarSeccion(sessionStorage.getItem('seccion'))
        }
        function mostrarSeccion(seccion){
            sessionStorage.setItem('seccion', seccion);
            const secciones = document.querySelectorAll('section')
            secciones.forEach((sec)=>sec.classList.add('hidden'))
            document.getElementById(seccion).classList.remove('hidden');
            cerrarSidebar();
        }
    </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="https://kit.fontawesome.com/ae7acbd10e.js" crossorigin="anonymous"></script>
</body>

</html>