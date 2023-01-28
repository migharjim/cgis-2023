# Laboratorio 3: Vistas

## Objetivo
El objetivo de este laboratorio es practicar con Laravel Blade para el desarrollo de vistas simples de relaciones 1-N (1 especialidad - N médicos) que permitan el inicio del desarrollo del proyecto individual al completo.
En este laboratorio el estudiante deberá implementará el CRUD básico de la entidad Especialidad, que consta de:
- Vista de listado de especialidades (incluyendo paginación). El listado deberá dar acceso a las acciones de crear, editar y borrar especialidades.
![listado-especialidades.png](public%2Flistado-especialidades.png)
- Vista de creación de especialidad. El formulario deberá impedir en cliente que el formulario se envíe si el nombre está vacío y mostrar los errores devueltos por el controlador en caso de haberlos y mantener los valores introducidos por el usuario en dicho caso. Se debe poder navegar al listado de especialidades además de poder guardar la especialidad.
![crear-especialidad.png](public%2Fcrear-especialidad.png)
- Vista de edición de especialidad. El formulario deberá mostrar los valores almacenados en la base de datos al inicio de la edición, los errores en su caso y mantener los valores introducidos por el usuario en caso de error. 
![editar-especialidad.png](public%2Feditar-especialidad.png)

Además, deberá realizar las vistas del lado N de la relación: Médico.
- Vista de listado de médicos (incluyendo paginación). El listado deberá dar acceso a las acciones de crear, editar y borrar médicos.
![listado-medicos.png](public%2Flistado-medicos.png)
- Vista de creación de médico. Deberá poderse elegir una especialidad de la lista de especialidades disponibles en la base de datos (relación 1-N) y deberá validarse en cliente todo aquello que sea posible. Para ello, compruebe las reglas de validación presentes en MedicoController::store para establecer las restricciones de validación en el formulario.
![crear-medico.png](public%2Fcrear-medico.png)
- Vista de detalle de médico (incluyendo el nombre de la especialidad). Nótese que en el título aparece Editar Médico NOMBREMEDICO. Corríjalo y muestre el mensaje "Detalle de médico NOMBREMEDICO" en lugar de "Editar médico NOMBREMEDICO".
![show-medico.png](public%2Fshow-medico.png)
- Vista de edición de médico. Deberá poderse elegir una especialidad de la lista de especialidades disponibles en la base de datos (relación 1-N) y deberá validarse en cliente todo aquello que sea posible. Para ello, compruebe las reglas de validación presentes en MedicoController::update para establecer las restricciones de validación en el formulario.
![editar-medico.png](public%2Feditar-medico.png)
## Requisitos

Recuerde que son los controladores los que se encargan de gestionar las peticiones HTTP y devolver las respuestas HTTP. Por tanto, deberá comprobar qué vistas son las utilizadas por dichos controladores para que las vistas funcionen correctamente. 

Ademáse, en este laboratorio, las rutas necesarias para que las vistas funcionen correctamente están implementadas.

Al finalizar el laboratorio, además de establecerse un diseño similar al adjunto en las capturas, la experiencia de usuario en cuanto al funcionamiento de la aplicación deberá ser similar al disponible en la rama master. Despliegue dicha como paso previo para establecer el comportamiento deseado y revise tantas veces sea necesario hasta conseguir el resultado deseado.
