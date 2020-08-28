# ProyectoAI-Gestion-de-Proyectos

Desarrollar una aplicación que permita administrar anteproyectos de grado. Debe tener 3 roles:
Administrador, Estudiante, Profesor.

El administrador tendrá los siguientes servicios:
1. Autenticar
2. Crear estudiante. Use los atributos que considere necesarios
3. Crear Profesor. Use los atributos que considere necesarios
4. Consultar estudiante.
5. Consultar proyecto. Después de consultar estudiante, el administrador podrá consultar los
proyectos de un estudiante.
6. Asignar tutor. Después de consultar proyecto, el administrador podrá asignar un profesor
tutor
7. Asignar jurado. Después de consultar proyecto, el administrador podrá asignar un profesor
jurado

El estudiante tendrá los siguientes servicios:
1. Autenticar
2. Crear proyecto. Use los atributos que considere necesarios (Ej: titulo, planteamiento,
objetivos, etc). El proyecto requerirá que se publique un archivo pdf con el anteproyecto. El
estudiante que crea el proyecto puede agregar a otro estudiante al proyecto.
3. Consultar proyecto. Debe mostrar un estado entre: “Creado por estudiante”, “Asignado a
tutor”, “Revisado por tutor”, “Asignado a Jurado”, “Aprobado por Jurado”

El profesor tendrá los siguientes servicios:
1. Autenticar
2. Consultar proyectos asignados como tutor. Usar modal para ver todos los atributos
3. Revisar proyecto. Después consultar proyecto asignado como tutor, podrá cambiar el
estado a “Revisado por tutor” Usar Ajax
4. Consultar proyectos asignados como jurado. Usar modal para ver todos los atributos
5. Aprobar proyecto. Después consultar proyecto asignado como jurado, podrá cambiar el
estado a “Aprobado por Jurado” Usar Ajax
