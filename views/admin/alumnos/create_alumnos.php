
<div id="createAlumno" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!-- Título del modal -->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Crear Alumno</p>
                    <button class="closeModal text-gray-500 hover:text-gray-700">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.348 14.849a1 1 0 0 1-1.415 1.415L10 11.414l-2.931 2.93a1 1 0 1 1-1.415-1.415L8.586 10 5.657 7.071a1 1 0 0 1 1.415-1.415L10 8.586l2.931-2.931a1 1 0 0 1 1.415 1.415L11.414 10l2.934 2.849z" />
                        </svg>
                    </button>
                </div>

                <!-- Contenido del modal -->
                <form action="/alumnos/create" id="maestros_form" method="post">
                <div class="mb-4">
                        <label for="DNI" class="bold text-lg">DNI</label>
                        <div class="flex items-center border border-gray-300 p-2 rounded">
                            <input required type="text" placeholder="DNI" id="DNI" name="DNI" class="w-full focus:outline-none">
                            <i class="fas fa-id-card text-gray-500"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="bold text-lg">Correo electronico</label>
                        <div class="flex items-center border border-gray-300 p-2 rounded">
                            <input required type="text" placeholder="Correo" id="email" name="email" class="w-full focus:outline-none">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="bold text-lg">Contrasena</label>
                        <div class="flex items-center border border-gray-300 p-2 rounded">
                            <input required type="password" placeholder="Password" id="password" name="password" class="w-full focus:outline-none">
                            <i class="fas fa-key text-gray-500"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="bold text-lg">Nombre y apellido</label>
                        <div class="flex items-center border border-gray-300 p-2 rounded">
                            <input required type="text" placeholder="Nombre Completo" id="name"  name="name" class="w-full focus:outline-none">
                            <i class="fas fa-user text-gray-500"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="bold text-lg">Direccion</label>
                        <div class="flex items-center border border-gray-300 p-2 rounded">
                            <input required type="text" placeholder="Direccion" id="adress"  name="adress" class="w-full focus:outline-none">
                            <i class="fas fa-map-marker text-gray-500"></i>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="bold text-lg">Fecha de Nacimiento</label>
                        <div class="flex items-center border border-gray-300 p-2 rounded">
                            <input required type="date" id="born_date"  name="born_date" class="w-full focus:outline-none">
                        </div>
                    </div>
                    <div class="mb-4 text-end">
                        <button class="closeModal bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition-colors duration-300">Close</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-300">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
        document.getElementById('createAlumnoButton').addEventListener('click', function() {
            document.getElementById('createAlumno').classList.remove('hidden');

        });

        //Cerrar el modal al hacer click en la X
        document.querySelectorAll('.closeModal').forEach(function(close) {
            close.addEventListener('click', function(e) {
                document.getElementById('createAlumno').classList.add('hidden');
                e.preventDefault();
            });
        })

        // Cerrar el modal al hacer clic en el botón de cerrar o fuera del modal
        document.querySelectorAll('.modal-overlay').forEach(function(overlay) {
            overlay.addEventListener('click', function() {
                document.getElementById('createAlumno>').classList.add('hidden');
            });
        });

</script>