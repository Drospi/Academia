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
            columnDefs: [{
                                targets: [0],
                                orderable: false,
                                render: function(data, type, row, meta) {
                                    return meta.row + 1;
                                }
                }],
            dom: 'Bfrtilp',
            buttons:[
                {
                    extend: 'colvis',
                                    footer: true,
                                    text: '<div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-columns"></i> Columnas</div>',
                                    titleAttr: 'Columnas visibles',
                                    className: 'btn btn-primary'
                                },
                                {
                                    extend: 'excelHtml5',
                                    text: '<div class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="far fa-file-excel"></i> Excel</div>',
                                    titleAttr: 'Exportar a excel'
                                },
                                {
                                    extend: 'pdfHtml5',
                                    text: '<div class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="far fa-file-pdf"></i> PDF</div>',
                                    titleAttr: 'Exportar a pdf',
                                    className: 'btn btn-success'
                                }
            ]

        });
    });
    </script>