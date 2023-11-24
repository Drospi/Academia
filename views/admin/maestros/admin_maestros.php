

<h1 class="text-2xl py-4 ml-4">Lista de Maestros</h1>
<div class="text-end m-4">
<button id="createMaestroButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Abrir Modal</button>
</div>
<div class="w-auto mx-12">
<table id="maestros_table" class="mt-6 w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 border-b">#</th>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Correo</th>
            <th class="py-2 px-4 border-b">Rol</th>
            <th class="py-2 px-4 border-b">Direccion</th>
            <th class="py-2 px-4 border-b">Fec. de Nacimiento</th>
            <th class="py-2 px-4 border-b">Acciones</th>
        </tr>
    </thead>
<tbody>

<?php foreach($usuarios as $usuario){  ?>
    <tr>
    <td class='py-2 px-4 border-b'><?php echo $usuario['id'] ?></td>
    <td class='py-2 px-4 border-b'><?php echo $usuario['name'] ?></td> 
        <td class='py-2 px-4 border-b'><?php echo $usuario['email'] ?></td>
        <?php if($usuario['rol']==1){
            echo "<td class='py-2 bg-yellow-300 px-4 border-b'>Administrador</td>";
        }elseif($usuario['rol']==2){
            echo "<td class='py-2 bg-sky-400 text-white px-4 border-b'>Maestro</td>";
        }elseif($usuario['rol']==3){
            echo "<td class='py-2 bg-gray-300 text-white px-4 border-b'>Alumno</td>";
        }
        ?>
        <td class='py-2 px-4 border-b'><?php echo $usuario['adress'] ?></td>
        <td class='py-2 px-4 border-b'><?php echo $usuario['born_date'] ?></td>
        <td class="py-2 px-4 border-b">
        <button id="maestro<?php echo $usuario['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> Editar</button>
        </td>
    </tr>

    <?php }?>
</tbody>
</table>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/maestros/edit_maestros.php";?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/maestros/create_maestros.php";?>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#maestros_table',{
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
