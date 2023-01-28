# Proyecto citas CGIS

## Objetivo
El objetivo de este laboratorio es el desarrollo de los elementos básicos de la capa de controlador del proyecto de citas.
Para ello tendremos que realizar las siguientes funcionalidades CRUD de Médico, que han sido eliminadas del proyecto.


HU 1 - Gestión de médicos

    RF 1.1 - Listado de médicos.
    Como administrador,
    Quiero ver un listado de los médicos del sistema paginados de 10 en 10.
    
    RF 1.2 - Detalle de médico.
    Como administrador,
    Quiero ver el detalle de un médico.

    RF 1.3 - Creación de médico.
    Como administrador,
    Quiero crear un médico. Para ello, se debe indicar el nombre y apellidos, email, contraseña, fecha de contratación, si está vacunado de COVID o no, el sueldo y la especialidad. Deberé poder elegir la especilidad del médico entre el listado de especialidades ya existentes en la base de datos del sistema. El sistema debe impedir la creación de médico si:
    - El email ya existe.
    - El email no tiene el formato correcto.
    - La contraseña no tiene al menos 8 caracteres y viene la contraseña y su confirmación.
    - El sueldo no puede ser negativo
    - La especialidad tiene que ser una de las ya disponibles en el sistema.
    El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de médicos con un mensaje de éxito.

    RF 1.3 - Edición de médico.
    Como administrador,
    Quiero editar un médico eligiéndolo a partir del listado de médicos y llevándome a una nueva pantalla donde pueda trabajar con los datos. Para ello, se debe poder modificar el nombre y apellidos, email, fecha de contratación, si está vacunado de COVID o no, el sueldo y la especialidad. Deberé poder elegir la especilidad del médico entre el listado de especialidades ya existentes en la base de datos del sistema. El sistema debe impedir la edición de médico si:
    - El email no tiene el formato correcto.
    - La contraseña no tiene al menos 8 caracteres y viene la contraseña y su confirmación.
    - El sueldo no puede ser negativo
    - La especialidad tiene que ser una de las ya disponibles en el sistema.
    El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de médicos con un mensaje de éxito.
    
    RF 1.4 - Borrado de médico.
    Como administrador,
    Quiero borrar un médico. El sistema deberá alertarme de la irrevocabilidad de esta acción y pedir confirmación. En caso de confirmación, el sistema deberá borrar el médico y navegar al listado actualizado de médicos con un mensaje de éxito.

Recuerde que tiene disponible tanto los modelos de datos como las vistas de la aplicación en el repositorio de GitHub. Trabaje con los controladores y rutas necesarias para cumplir con los requisitos funcionales especificados.

Una vez completado el laboratorio, la aplicación debería funcionar exactamente igual que funciona la gestión de médicos de la aplicación desplegada en la rama master. Recuerde que puede desplegarla para inspirarse. Para ello, logee como administrador para comprobar las funcionalidades realizadas.

