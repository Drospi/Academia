<h1 class="text-2xl py-4 ml-4">Esquema de clases del estudiante <?php echo $_SESSION['nombre'] ?></h1>

<div class="w-auto mx-12">
<table id="clases_table" class="mt-6 w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 border-b">#</th>
            <th class="py-2 px-4 border-b">Materias</th>
            <th class="py-2 px-4 border-b">Darse de baja</th>
        </tr>
    </thead>
<tbody>

    <?php foreach($clasesInscritas as $claseI){  ?>
        <tr>
            <td class='py-2 px-4 border-b'><?php echo $claseI['id_materia'] ?></td>
            <td class='py-2 px-4 border-b'><?php echo $claseI['materia'] ?></td>            
            <td class="py-2 px-4 border-b">
                <form action="/baja" method="post">
                    <input type="number" hidden value="<?php echo $_SESSION['id'] ?>" name="id_usuario">
                    <input type="number" hidden value="<?php echo $claseI['id_materia'] ?>" name="id_materia">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php } ?>
        
    </tbody>
</table>

<div  class="mx-auto p-6 bg-white shadow-md rounded-lg w-72">
<h2 class="text-2xl font-bold mb-4">Título del Container</h2>
<?php if(count($clasesNoInscritas)==0){
    echo "<p>Estas inscrito en todas las clases.</p>";
}else{ ?>
  <p>Aquí puedes agregar contenido adicional si lo necesitas.</p>
  
  <form action="/inscribirse" method="post">
      <div class="border border-gray-300 rounded-md p-3">
      <?php foreach($clasesNoInscritas as $claseN){  ?>
          <label for="<?php echo $claseN['id']?>" class="opcion-label border-b border-gray-300 w-73">
              <input hidden type="checkbox" id="<?php echo $claseN['id']?>" name="opciones[]" data-id="<?php echo $claseN['id']?>" value="<?php echo $claseN['id']?>" class="opcion-input">
              <?php echo $claseN['materia'] ?>
          </label><br>
          <?php }?>
          <input type="number" hidden value="<?php echo $_SESSION['id'] ?>" name="id_usuario">
      <!-- Agrega más checkboxes según sea necesario -->
    </div>
  
      <button class="bg-blue-500 hover:bg-blue-700 text-white rounded p-4" type="submit" value="Enviar">Enviar</button>
  </form>
  <?php } ?>
</div>

<script>
  const checkboxes = document.querySelectorAll('.opcion-input');
  
  checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
          const id = this.getAttribute('data-id');
          const label = this.parentElement;
          
    if (this.checked) {
        label.classList.add('bg-blue-500')
        label.classList.add('text-white')
      // Acción cuando el checkbox está marcado
    } else {
      label.classList.remove('bg-blue-500')
      label.classList.remove('text-white')
      // Acción cuando el checkbox está desmarcado
    }
  });
});
</script>

    
</div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
        let table = new DataTable('#clases_table',{
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