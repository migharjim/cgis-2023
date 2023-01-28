# Laboratorio 1 - Modelo

## Objetivo

El objetivo de este laboratorio es desarrollar la capa de Modelo del proyecto de gestión de citas.
Para ello, en esta rama encontrará el proyecto de citas completo excepto la capa de Modelo.

## Requisitos

1. Crear los modelos necesarios para cumplir con el siguiente diagrama Entidad/Relación:
![diagrama-er-citas-cgis.svg](public%2Fdiagrama-er-citas-cgis.svg)
2. Crear las migraciones necesarias para crear las tablas en la base de datos.
3. Crear los seeders necesarios para poblar la base de datos con datos de prueba con los siguientes datos:
    - 3 especialidades: Oftalmología, Neurología, Cardiología.
    - 1 médico.
    - 1 paciente.
    - 1 administrador.
    - 1 medicamento.
    - 1 cita, que tengan como médico al médico creado, como paciente al paciente creado. Tendrá también asociada una prescripción al medicamento creado.

Tenga en cuenta que, para poder crear la cita, deberá crear primero el médico y el paciente, ya que la cita tiene como clave foránea a estos dos modelos.
Sepa además que los modelos deberán permitir el auto-rellenado (fill) de todas las propiedades provistas por los formularios de creación/edición de dichas entidades. Despliegue la rama master de este proyecto si tiene dudas de qué campos deben ser fillables.

Recuerde que, para comprobar que todo funciona, al entrar en http://localhost debería poder hacer login con los usuarios que ha creado y ver la cita, medicamentos y especialidades que haya introducido con los seeders.
Apóyese en los errores que vayan apareciendo durante el desarrollo para la corrección de los mismos.

