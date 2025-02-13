# Proyecto Laravel FPDual

![Descripción de la imagen](/public/images/imagen1.png)


## Acerca del Proyecto

Este proyecto es una aplicación web basada en Laravel diseñada para gestionar empresas y profesores. Proporciona funcionalidades para crear, leer, actualizar y eliminar (CRUD) registros tanto de empresas como de profesores. Además, incluye una API RESTful para interactuar con estos recursos y un sistema de autenticación para profesores.

## Características

- **Gestión de Empresas**: Administra registros de empresas incluyendo nombre, dirección, teléfono, correo electrónico y fecha de creación.
- **Gestión de Profesores**: Administra registros de profesores incluyendo nombre completo, edad, género, dirección, teléfono y correo electrónico.
- **Interfaz de Usuario**: Una interfaz amigable construida con Bootstrap para facilitar la navegación e interacción.
  ![Descripción de la imagen](/public/images/imagen2.png)
- **API RESTful**: Proporciona endpoints para interactuar con los recursos de empresas y profesores a través de una API RESTful.
   ![Descripción de la imagen](/public/images/imagen4.png)
- **Autenticación de Profesores**: Permite a los profesores registrarse, iniciar sesión y cerrar sesión mediante un sistema de autenticación seguro.
  ![Descripción de la imagen](/public/images/imagen5.png)

## Estructura del Proyecto

La estructura del proyecto sigue la estructura estándar del framework Laravel:

```text
Laravel_Proyecto_FPDual/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── API/
│   │       │   ├── AuthController.php
│   │       │   ├── CompanyApiController.php
│   │       │   └── ProfessorApiController.php
│   │       ├── CompanyController.php
│   │       ├── ProfessorController.php
│   │       └── Controller.php
│   ├── Models/
│   │   ├── Company.php
│   │   └── Professor.php
│   ├── Providers/
│   └── Resources/
│       ├── AuthResource.php
│       ├── CompanyResource.php
│       └── ProfessorResource.php
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── CompanysSeeder.php
│       └── ProfessorSeeder.php
├── public/
├── resources/
│   ├── views/
│   │   ├── companys/
│   │   │   ├── create.blade.php
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   │   └── edit.blade.php
│   │   ├── professors/
│   │   │   ├── create.blade.php
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   │   └── edit.blade.php
│   │   └── layouts/
│   │       └── app.blade.php
├── routes/
│   └── web.php
├── storage/
├── tests/
├── vendor/
├── .env
├── .env.example
├── .gitattributes
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── README.md
└── vite.config.js
```

## Instalación

1. Clona el repositorio:

   ```sh
   git clone https://github.com/tuusuario/Laravel_Proyecto_FPDual.git
   cd Laravel_Proyecto_FPDual
   ```
2. Instala las dependencias:

   ```sh
   composer install
   npm install
   ```
3. Copia el archivo `.env.example` a `.env` y configura tus variables de entorno:

   ```sh
   cp .env.example .env
   ```
4. Genera la clave de la aplicación:

   ```sh
   php artisan key:generate
   ```
5. Ejecuta las migraciones y seeders de la base de datos:

   ```sh
   php artisan migrate --seed
   ```
6. Inicia el servidor de desarrollo:

   ```sh
   php artisan serve
   ```

## Uso

- Accede a la aplicación en `http://localhost:8000`.
- Utiliza la barra de navegación para gestionar empresas y profesores.

## CAMBIOS PASO A API del proyecto:

### Cambios de Luis

- Las respuestas ahora incluyen códigos HTTP adecuados (`200`, `201`).
- Las rutas ahora se basan en REST, sin necesidad de `create()` y `edit()` porque los formularios ya no son necesarios.
- No se modificó la relación con `Professor`, solo se mantuvo la validación en caso de que el campo `professor_id` sea nulo.

### Cambios de Adrián

- Creación y manejo de la API para mi Modelo Profesores.
- Creación de la carpeta app/http/Controllers/API y creacion del archivo ProfessorController, el cual maneja las respuestas json de la API.
- Creación del archivo ProfessorRequest con su carpeta.
- Comprobación con herramienta ThunderClient del correcto funcionamiento de la API.
- Las respuestas ahora incluyen códigos HTTP adecuados (`200`, `201`).
- Las rutas ahora se basan en REST, sin necesidad de `create()` y `edit()` porque los formularios ya no son necesarios.

### Cambios de Antonio

- **AuthController**:
  - **Registro**: Valida y crea nuevos profesores, retornando un mensaje de éxito y los datos del profesor (antes se hacía desde `ProfessorApiController`).
  - **Inicio de Sesión**: Valida credenciales y genera un token de acceso para profesores autenticados.
  - **Cierre de Sesión**: Elimina el token de acceso actual, cerrando la sesión del profesor.

- **AuthRequest**:
  - **Reglas de Validación**: Define reglas para registro (nombre, edad, género, etc.) y login (email y contraseña).

- **AuthResource**:
  - **Formato de Respuesta**: Estructura los datos del profesor (ID, nombre, edad, género, etc.) para las respuestas JSON.

- **Mejoras en Vistas**:
  - **Diseño**: Mejoras en la apariencia y usabilidad de las vistas.

- **Documentación**:
  - **Comentarios**: Añadidos comentarios explicativos para una correcta documentación del código.
