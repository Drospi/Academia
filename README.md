## Consideraciones para probar el proyecto
- Usuarios
| Usuarios                 | Contrasenas     |
| :----------------------- | :-------------: |
| admin@admin              |      admin      |
| maestro@maestro          |      maestro    |
| alumno@alumno            |      alumno     |
 Y de la mayoria sus contras son el correo antes del @
 Importar la base de datos con nombre universidad, sino cambiar la config/database.php
 

## Consideraciones EXTRAS realizadas:

- El diseño es 100% responsive.
- Las tablas tienen botones que permiten exportar los datos de las mismas en formato PDF, Excel, etc.
- Las tablas están paginadas.
- El admin puede ver la cantidad de alumnos inscritos en cada clase.
- Cada maestro puede Crear, Leer, Actualizar y Eliminar calificaciones y comentarios de sus alumnos.
- El alumno puede ver en la pestaña "Ver Calificaciones" un mensaje dejado por el maestro y la calificación de cada curso.
- Se uso el plugin de Datatables (https://datatables.net/).
- Se desarrollo toda la interfaz del usuario (UI) desde cero.
- Al darse de baja de una materia, se eliminan tambien las calificaciones de esa materia
- Se puede ordenar por el metodo presionando el campo respectivo de forma ascendente y descendente
- Se puede seleccionar que columnas ver y que columnas no el el boton de Columnas

