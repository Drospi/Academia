<h1 class="text-2xl py-4 ml-4">Lista de Permisos</h1>
<div class="w-auto mx-12">
<table id="myTable" class="mt-6 w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 border-b">#</th>
            <th class="py-2 px-4 border-b">Correo</th>
            <th class="py-2 px-4 border-b">Usuario</th>
            <th class="py-2 px-4 border-b">Rol</th>
            <th class="py-2 px-4 border-b">Acciones</th>
        </tr>
    </thead>
<tbody>

<?php foreach($usuarios as $usuario){  ?>
    <tr>
    <td class='py-2 px-4 border-b'><?php echo $usuario['id'] ?></td>
        <td class='py-2 px-4 border-b'><?php echo $usuario['email'] ?></td>
        <td class='py-2 px-4 border-b'><?php echo $usuario['name'] ?></td> 
        <?php if($usuario['rol']==1){
            echo "<td class='py-2 bg-yellow-300 px-4 border-b'>Administrador</td>";
        }elseif($usuario['rol']==2){
            echo "<td class='py-2 bg-sky-400 text-white px-4 border-b'>Maestro</td>";
        }elseif($usuario['rol']==3){
            echo "<td class='py-2 bg-gray-300 text-white px-4 border-b'>Alumno</td>";
        }
        ?>
        <td class="py-2 px-4 border-b">
        <button id="<?php echo $usuario['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> Editar</button>
        </td>
    </tr>

    <?php }?>
</tbody>
</table>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/permisos/edit_permisos.php";?>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#myTable',{
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

