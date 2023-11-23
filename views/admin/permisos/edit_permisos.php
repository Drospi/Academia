<?php foreach ($usuarios as $usuario) {  ?>
    <div id="<?php echo $usuario['email'] ?>" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!-- Título del modal -->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Editar Permiso</p>
                    <button class="closeModal text-gray-500 hover:text-gray-700">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.348 14.849a1 1 0 0 1-1.415 1.415L10 11.414l-2.931 2.93a1 1 0 1 1-1.415-1.415L8.586 10 5.657 7.071a1 1 0 0 1 1.415-1.415L10 8.586l2.931-2.931a1 1 0 0 1 1.415 1.415L11.414 10l2.934 2.849z" />
                        </svg>
                    </button>
                </div>

                <!-- Contenido del modal -->
                <form action="/permisos/edit" id="permisos_form" method="post">
                    <div class="mb-4">
                        <label for="email">Email del Usuario</label>
                        <div class="flex bg-white items-center border border-gray-300 p-2 rounded">
                            <input type="text" placeholder="Correo" id="email" value="<?php echo $usuario['email'] ?>" name="email" class="w-full focus:outline-none">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="rol">Rol del usuario</label>
                        <select class="w-full cursor-pointer appearance-none border border-gray-300 p-2 rounded leading-tight focus:outline-none focus:border-blue-500" name="rol" id="rol">
                            <?php
                            $roles = ['Admin', 'Maestro', 'Alumno'];
                            for ($i = 1; $i <= count($roles); $i++) {
                                $selected = ($i == $usuario['rol']) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $roles[$i - 1]; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <input type="text" hidden name="id" value="<?php echo $usuario['id'] ?>">
                    <div class="mb-4 text-end">
                        <button class="closeModal bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition-colors duration-300">Close</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-300">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    <?php foreach ($usuarios as $usuario) {  ?>
        document.getElementById('<?php echo $usuario['id'] ?>').addEventListener('click', function() {
            document.getElementById('<?php echo $usuario['email'] ?>').classList.remove('hidden');

        });

        //Cerrar el modal al hacer click en la X
        document.querySelectorAll('.closeModal').forEach(function(close) {
            close.addEventListener('click', function() {
                document.getElementById('<?php echo $usuario['email'] ?>').classList.add('hidden');
            });
        })

        // Cerrar el modal al hacer clic en el botón de cerrar o fuera del modal
        document.querySelectorAll('.modal-overlay').forEach(function(overlay) {
            overlay.addEventListener('click', function() {
                document.getElementById('<?php echo $usuario['email']; ?>').classList.add('hidden');
            });
        });

    <?php } ?>
</script>