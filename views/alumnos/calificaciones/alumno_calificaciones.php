<h1 class="text-2xl py-4 ml-4">Calificaciones y mensajes del Estudiante <?php echo $_SESSION['nombre'] ?></h1>

<div class="w-auto mx-12">
<table id="alumnos_calificaciones" class="mt-6 w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 border-b">#</th>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Calificacion</th>
            <th class="py-2 px-4 border-b">Mensajes</th>
        </tr>
    </thead>
<tbody>

<?php foreach($materias as $materia){  ?>
    <tr>
    <td class='py-2 px-4 border-b'><?php echo $materia['id'] ?></td>
    <td class='py-2 px-4 border-b'><?php echo $materia['materia'] ?></td>
    <td class='py-2 px-4 border-b'><?php echo $materia['calificacion'] ?></td>
    <td class='py-2 px-4 border-b'><?php echo $materia['mensajes'] ?></td>

        
    </tr>

    <?php }?>
    
</tbody>
</table>

</div>


    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#alumnos_calificaciones',{
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