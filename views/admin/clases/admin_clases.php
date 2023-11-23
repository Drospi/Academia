<h1 class="text-2xl py-4 ml-4">Lista de Clases</h1>
<div class="text-end m-4">
    <button id="createClaseButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Clase</button>
</div>
<div class="w-auto mx-12">
    <table id="clases_table" class="mt-6 w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">Clase</th>
                <th class="py-2 px-4 border-b">Maestro</th>
                <th class="py-2 px-4 border-b">Alumnos Inscritos</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $arrayDisplayed = [];
             foreach ($materias as $materia) {  
                if(!in_array($materia['id_materia'],$arrayDisplayed)){
                    $arrayDisplayed[]=$materia['id_materia']?>
                <tr>
                    <td class='py-2 px-4 border-b'><?php echo $materia['id'] ?></td>
                    <td class='py-2 px-4 border-b'><?php echo $materia['materia'] ?></td>
                    <?php 
                    $maestros = "<td class='py-2 px-4 border-b'>".$materia['name']."</td>" ;
                    if($materia['name'] == NULL){
                            $maestros="<td class='py-2 px-4 bg-yellow-500 border-b'>Sin Asignacion</td>";
                        }
                        echo $maestros;
                     ?>
                    <?php 
                    $alumnosInscritos="<td class='py-2 px-4 bg-yellow-500 border-b'>Sin Alumnos</td>";
                    foreach($inscritos as $inscrito){
                        if($inscrito['id'] == $materia['id_materia']){
                            $alumnosInscritos = "<td class='py-2 px-4 border-b'>".$inscrito['alumnos_inscritos']."</td>" ;
                            break;
                        }
                    }
                        echo $alumnosInscritos;
                     ?>
                    <td class="py-2 px-4 border-b">
                        <button id="clase<?php echo $materia['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Abrir Modal</button>
                    </td>
                </tr>
                <?php } }?>

        </tbody>
    </table>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/clases/create_clases.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/clases/edit_clases.php"; ?>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#clases_table', {
            responsive: 'true',
            dom: 'Bfrtilp',
            buttons: [{
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