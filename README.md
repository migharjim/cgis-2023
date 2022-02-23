# Proyecto citas CGIS

## Objetivo
El objetivo de esta aplicación es mostrar un proyecto mínimo donde se trabaje con:
- Laravel Sail como entorno de desarrollo basado en Docker. Más info: https://laravel.com/docs/master/sail
- Eloquent ORM para trabajar a alto nivel con base de datos MySQL, incluyendo:
  - Conocer las convenciones en el nombrado de modelos y tablas de Laravel. Más info: https://laravel.com/docs/master/eloquent#eloquent-model-conventions. Puedes ver ejemplos de cómo se nombran las tablas vs modelos en los siguientes casos:
    - app/Models/Cita.php vs. 2021_03_10_195932_create_citas_table.php (modelo: Cita, tabla: citas. Cita -> citas)
    - app/Models/Especialidad.php vs. 2021_03_02_115313_create_especialidads_table.php (Especialidad -> especialidads)
    - Tablas intermedias necesarias para relaciones N a N, por ejemplo entre citas y medicamentos: 2021_03_10_195933_create_cita_medicamento_table.php. (Medicamento-Cita -> cita_medicamento ¡orden alfabético y singular!).
  - Ejecutar desde PHP las operaciones básicas de SQL gracias a los métodos heredados de la clase Model que nos da Laravel, especialmente focalizado en gestionar el CRUD de las entidades. Recuerda que son los controladores (app/Http/Controllers) son los encargados de trabajar con los modelos y recuperar/insertar/modificar/borrar datos y pasar a las vistas la información requerida. Más info: https://laravel.com/docs/master/eloquent#retrieving-models
    - Listado de todas las entidades (paginadas o no). Ejemplo de recuperar todos los médicos paginados: app/Http/Controllers/MedicoController@index -> Medico::paginate(25). Más info sobre paginación: https://laravel.com/docs/master/pagination
    - Listado de todas las especialidades para así poder generar la vista de creación de médico, ya que necesitamos un desplegable con todas las especialidades disponibles para así elegirlas: app/Http/Controllers/MedicoController@create -> Especialidad::all(). Más info: https://laravel.com/docs/master/eloquent#retrieving-models
    - Crear un médico y guardarlo en la BBDD: app/Http/Controllers/MedicoController@store -> $medico = new Medico($request->all()); ..... $medico->save(); Más info: https://laravel.com/docs/master/eloquent#inserting-and-updating-models
    - Editar un médico y actualizarlo en la BBDD: app/Http/Controllers/MedicoController@update -> $medico->save(); Más info: https://laravel.com/docs/master/eloquent#inserting-and-updating-models
    - Borrar un médico de la BBDD: app/Http/Controllers/MedicoController@destroy -> $medico->delete(); Más info: https://laravel.com/docs/master/eloquent#deleting-models
    - Trabajar con relaciones N a N (attaching, detaching, syncing) -> app/Http/Controllers/CitaController@attach_medicamento / app/Http/Controllers/CitaController@detach_medicamento. Más info: https://laravel.com/docs/master/eloquent-relationships#updating-many-to-many-relationships
  - Conocer cómo se especifican las relaciones entre modelos (foreign keys) y cómo trabajar con estas relaciones como query especializable o como el resultado de ejecución de esa query Más info: https://laravel.com/docs/master/eloquent-relationships
    - Relación 1 a 1, ejemplo en la relación entre las clases Paciente y User. Métodos app/Models/Paciente@user y app/Models/User@paciente. Más info: https://laravel.com/docs/master/eloquent-relationships#one-to-one
    - Relación 1 a N, ejemplo en la relación entre Cita y Médico (Médico es el lado 1, Cita el lado N). Métodos app/Models/Medico@citas y app/Models/Cita@medico. Más info: https://laravel.com/docs/master/eloquent-relationships#one-to-many
    - Relación N a N, ejemplo en la relación entre Cita y Medicamento. Métodos app/Models/Medicamento@citas y app/Models/Cita@medico. Más info: https://laravel.com/docs/master/eloquent-relationships#many-to-many
- Migraciones para crear el esquema de la base de datos (database/migrations). Más info: https://laravel.com/docs/master/migrations
- Seeders para poblar con datos de prueba la base de datos (database/seeders). Más info: https://laravel.com/docs/master/seeding
- Definición de modelos disponibles en app/Models, que serán las encargadas de interactuar con la BBDD (capa Modelo en MVC), incluyendo: 
  - Propiedad fillable, que permite el rellenado automático de los atributos de las entidades a partir de los inputs una HTTP Request. Más info: https://laravel.com/docs/master/eloquent#mass-assignment
  - Propiedad casts, que permite la conversión de tipo entre cadenas (como está almacenada y como se obtiene de la BBDD) a tipos concretos en PHP, como fechas o booleanos. Ejemplo en app/Cita. https://laravel.com/docs/master/eloquent-mutators#attribute-casting
  - Propiedades derivadas (Accesors) getPropiedadAttribute que son accesibles como atributos de manera transparente (por ejemplo, se podría ejecutar el método getNombreCompletoAttribute de una hipotética clase Persona y obtener su resultado, dada una variable $persona de la clase Persona, tal que: $persona->nombre_completo). Ejemplo en app/Paciente@getMedicamentosActualesAttribute. Más info: https://laravel.com/docs/master/eloquent-mutators#defining-an-accessor
- Definición de rutas disponibles de la aplicación web (routes/web.php), que son las encargadas de escuchar las peticiones HTTP de los usuarios y ejecutar el método especificado en un controlador, incluyendo:
  - Definición de rutas simples, como Route::get('/pacientes-hoy', [PacienteController::class, 'pacientesHoy']); Más info: https://laravel.com/docs/master/routing
  - Definición de rutas de tipo recurso que crea 7 rutas, una para cada operación CRUD y la asocia a un controlador en concreto. Por ejemplo: Route::resources(['medicamentos' => MedicamentoController::class]);. Más info: https://laravel.com/docs/master/controllers#resource-controllers
  - Grupos de rutas con Route::group. Más info: https://laravel.com/docs/master/routing#route-groups
  - Inclusión de Middlewares, que son encargados de, data una petición HTTP, poder rechazarla o dejarla pasar (tal y como está o modificándola, sobrecargándola con más información, etc.). Ejemplo: app/Http/Middleware/IsTipoUsuario, que filtra las peticiones y solo deja pasar aquellas logeadas y cuyo usuario logeado pertenezca a una colección de tipo de usuarios. Este middleware está aplicado a diferentes grupos de ruta en el archivo routes/web.php. Por ejemplo: Route::middleware(['auth', 'tipo_usuario:3'])->group(function () {...}). Más info: https://laravel.com/docs/master/middleware. Recuerda que esta funcionalidad de restringir recursos (métodos) se puede realizar específicamente creando Policies (app/Policies). Más info: https://laravel.com/docs/master/authorization#creating-policies
- Definición de controladores de tipo recurso (app/Http/Controllers). Más info: https://laravel.com/docs/master/controllers, incluyendo:
  - Definición de Policies que permiten devolver un error de falta de permiso si el usuario que inicia la petición HTTP no tiene privilegios. Por ejemplo: app/Policies/CitaPolicy, que es una policy de tipo recurso asociada a Cita. Cada vez que un método CRUD (index, create, etc.) de CitaController vaya a ser ejecutado, uno de los métodos de CitaPolicy será invocado (index->viewAny, show->view,create->create, etc.). Si devuelve true, se permitirá la ejecución, si no, se devolverá un error de falta de permisos. Más info sobre las policies : https://laravel.com/docs/master/authorization#creating-policies
  - Aplicación de policies a nivel controlador. Por ejemplo: app/Http/Controllers/CitaController, método constructor __construct.
- Definición de vistas, incluyendo:
  - Trabajo con las Blade Template, que nos permiten utilizar código PHP para renderizar de manera dinámica HTML. Por ejemplo, en la vista resources/views/medicos/index.blade.php usamos la cláusula @foreach, que nos permite recorrer un array que el controlador (en este caso, el array $medicos que le pasa el método app/Http/Controllers/MedicoController@index) Más info: https://laravel.com/docs/master/blade
  - Creación de plantillas que nos permitan mantener el mismo estilo en toda sin tener que repetir código en cada vista de los elementos que se repiten, como barra de navegación, logo, etc. Todas las vistas heredarán el código de estas plantillas (layouts) y rellenarán los huecos dejados en la plantilla. Ejemplo: las tres vistas en resources/views/layouts. Más info: https://laravel.com/docs/master/blade#building-layouts
  - Trabajo con formularios y validación básica en cliente con HTML para la creación de recursos, incluyendo la gestión de errores recibidos por parte del Controlador así como repoblar los valores de los inputs tras mandar una petición de envío de formulario con errores gracias al método old. Por ejemplo: resources/views/medicos/create.blade.php. Más info sobre formularios: https://laravel.com/docs/master/blade#forms
  - Trabajo con formularios y validación básica en cliente con HTML para la edición de recursos, incluyendo la gestión de errores recibidos por parte del Controlador así como poblar por defecto los valores de los inputs con los valores que vienen en el recurso a editar. Por ejemplo: resources/views/medicos/edit.blade.php. Más info sobre formularios: https://laravel.com/docs/master/blade#forms
  - Vistas de detalle de un recurso, que puede mostrar no solo información relativa a ese recurso, sino a los recursos asociados (foreign keys). Por ejemplo: resources/views/citas/show.blade.php
  - Definición y trabajo con componentes, que son elementos reutilizables del front-end, como botones, inputs, etc. que se usan en toda la aplicación para mantener homogeneidad y no duplicar código. Por ejemplo, resources/views/components/button.blade.php que, una vez definido en el anterior archivo, se utiliza en las vistas, por ejemplo: resources/views/medicos/create.blade.php, como <x-button>. Más info: https://laravel.com/docs/master/blade#components

## Puesta en marcha
Siga estos pasos para ejecutar la aplicación en Laravel Sail. Se da por supuesto que tiene Docker disponible en su sistema.
1. Clone desde Visual Studio Code (o cualquier IDE de su preferencia) este repositorio.
2. Duplique el archivo .env.example y renómbrelo a .env
3. Desde el terminal, navegue hasta el directorio donde haya descargado el proyecto y ejecute: ``docker run --rm \
   -u "$(id -u):$(id -g)" \
   -v $(pwd):/var/www/html \
   -w /var/www/html \
   laravelsail/php81-composer:latest \
   composer install --ignore-platform-reqs``. Más info: https://laravel.com/docs/master/sail#installing-composer-dependencies-for-existing-projects.
4. Cuando termine, compruebe que la carpeta vendor está disponible.
5. Desde el terminal, partiendo del directorio base del proyecto, ejecute: ./vendor/bin/sail up -d
6. Asocie un terminal a la imagen de Docker que está corriendo el servidor web:![](https://i.ibb.co/m46S95z/Ejemplo-VSCode-Docker.png "VSCode Docker")
7. En el terminal que aparece, ejecute: ``php artisan migrate && php artisan db:seed && php artisan storage:link``
8. Abra su navegador y escriba en la barra de navegación: http://localhost
