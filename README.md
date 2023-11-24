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


Si existiesen requerimientos extras que se hayan realizado (de la lista de consideraciones opcionales o de tu propia iniciativa), debes dejar una nota en el archivo README.md de tu repositorio en GitHub que especifique cada una.