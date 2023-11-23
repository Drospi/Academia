<?php

class LogoutController
{
    public function logout(){
        session_start();
        session_destroy();
        ?>
        <script>
            // Limpiar sessionStorage antes de redirigir
            sessionStorage.clear();
            // Redirigir a la página de inicio
            window.location.replace("/index.php");
        </script>
        <?php
    }
        
}
?>