<h1 class="text-2xl py-4 ml-4">Lista de Alumnos</h1>
<div class="text-end m-4">
    <button id="createAlumnoButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Alumno</button>
</div>
<div class="w-auto mx-12">
    <table id="alumnos_table" class="mt-6 w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">DNI</th>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Correo</th>
                <th class="py-2 px-4 border-b">Rol</th>
                <th class="py-2 px-4 border-b">Direccion</th>
                <th class="py-2 px-4 border-b">Fec. de Nacimiento</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php $indexador = 1;
            foreach ($usuarios as $usuario) {  ?>
                <tr>
                    <td class='py-2 px-4 border-b'><?php echo $usuario['id'] ?></td>
                    <td class="py-2 px-4 border-b"><?php echo $usuario['DNI'] ?></td>
                    <td class='py-2 px-4 border-b'><?php echo $usuario['name'] ?></td>
                    <td class='py-2 px-4 border-b'><?php echo $usuario['email'] ?></td>
                    <?php if ($usuario['rol'] == 1) {
                        echo "<td class='py-2 bg-yellow-300 px-4 border-b'>Administrador</td>";
                    } elseif ($usuario['rol'] == 2) {
                        echo "<td class='py-2 bg-sky-400 text-white px-4 border-b'>Maestro</td>";
                    } elseif ($usuario['rol'] == 3) {
                        echo "<td class='py-2 bg-gray-300 text-white px-4 border-b'>Alumno</td>";
                    }
                    ?>
                    <td class='py-2 px-4 border-b'><?php echo $usuario['adress'] ?></td>
                    <td class='py-2 px-4 border-b'><?php echo $usuario['born_date'] ?></td>
                    <td class="py-2 px-4 border-b flex gap-2">
                        <form action="/delete/alumnos" method="post">
                            <input type="number" hidden name="id" value="<?php echo $usuario['id'] ?>">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <button id="alumno<?php echo $usuario['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> </button>
                    </td>
                </tr>

            <?php $indexador++;
            } ?>
        </tbody>
    </table>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/alumnos/edit_alumnos.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/alumnos/create_alumnos.php" ?>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
                let table = new DataTable('#alumnos_table', {
                        responsive: 'true',
                        columnDefs: [{
                                targets: [0],
                                render: function(data, type, row, meta) {
                                    return meta.row + 1;
                                }
                }],
                            dom: 'Bfrtilp',
                            buttons: [{
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

