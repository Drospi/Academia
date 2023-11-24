<h1 class="text-2xl py-4 ml-4">Lista de Alumnos de la Materia de <?php echo $_SESSION['materia'] ?></h1>

<div class="w-auto mx-12">
<table id="maestro_alumnos_table" class="mt-6 w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 border-b">#</th>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Calificacion</th>
            <th class="py-2 px-4 border-b">Mensajes</th>
            <th class="py-2 px-4 border-b">Acciones</th>
        </tr>
    </thead>
<tbody>

<?php foreach($usuarios as $usuario){  ?>
    <tr>
    <td class='py-2 px-4 border-b'><?php echo $usuario['id'] ?></td>
    <td class='py-2 px-4 border-b'><?php echo $usuario['name'] ?></td>

        <?php
        $cal = ' ';
         foreach($calificaciones as $calificacion){
            if($calificacion['id_usuario']==$usuario['id_usuario']){
                $cal = $calificacion['calificacion'];
            }
        } ?>
        <td class='py-2 px-4 border-b'><?php echo $cal?></td>
        <?php
        $mess = "<td class='py-2 bg-cyan-400 px-4 border-b'>Sin Asignar</td>";
        foreach($calificaciones as $calificacion){
           if($calificacion['id_usuario']==$usuario['id_usuario']){
               $mess = "<td class='py-2 px-4 border-b'>".$calificacion['mensajes']."</td>";
           }
       } 
       echo $mess;
        ?>
        
        <td class="py-2 px-4 border-b">
        <button id="alumno<?php echo $usuario['id_usuario']?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Abrir Modal</button>
        </td>
    </tr>

    <?php }?>
</tbody>
</table>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/maestro/maestro_calificacion.php";?>


    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#maestro_alumnos_table',{
            responsive: 'true',
            dom: 'Bfrtilp',
            buttons:[
                {
                    extend: 'colvis',
                    text: 'columnas',
                    titleAttr: 'Columnas visibles',
                    className: 'bg-gray-300'
                },
                {
                    extend: 'excelHtml5',
                    text: 'excel',
                    titleAttr: 'Exportar a excel',
                    className: 'bg-gray-300'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'pdf',
                    titleAttr: 'Exportar a pdf',
                    className: 'bg-gray-300'
                }
            ]

        });
    });
    </script>