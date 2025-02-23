# Proyecto Laravel FPDual

![Descripción de la imagen](/public/images/imagen1.png)


## Acerca del Proyecto

Este proyecto es una aplicación web basada en Laravel diseñada para gestionar empresas y profesores. Proporciona funcionalidades para crear, leer, actualizar y eliminar (CRUD) registros tanto de empresas como de profesores. Además, incluye una API RESTful para interactuar con estos recursos y un sistema de autenticación para profesores.

## Características

- **Gestión de Empresas**: Administra registros de empresas incluyendo nombre, dirección, teléfono, correo electrónico y fecha de creación.
  
- **Gestión de Profesores**: Administra registros de profesores incluyendo nombre completo, edad, género, dirección, teléfono y correo electrónico.
  
- **Interfaz de Usuario**: Una interfaz amigable construida con Bootstrap para facilitar la navegación e interacción.
  
- **Vista index**: Una vista que muestra los profesores con las empresas que le corresponde del mismo modo que con las empresas.
  ![Descripción de la imagen](/public/images/imagen2.png)

- **Vista Create**: Una vista que permite crear profesores y empresas.
  ![Descripción de la imagen](/public/images/imagen6.png)

- **Vista Edit**: Una vista que permite actualizar los datos de los profesores y empresas existentes.
  
  ![Descripción de la imagen](/public/images/imagen7.png)
- **Vista Show**: Una vista que muestra los detalles completos de un profesor y las empresas asociadas a él.
  ![Descripción de la imagen](/public/images/imagen8.png)

**API RESTful**: Proporciona endpoints para interactuar con los recursos de empresas y profesores a través de una API RESTful.

- **Obtener información**: Obtiene profesores o empresas
   ![Descripción de la imagen](/public/images/imagen4.png)

- **Registrar información**: Crea un nuevo profesor o empresa
   ![Descripción de la imagen](/public/images/imagen9.png)
   ![Descripción de la imagen](/public/images/imagen10.png)

- **Actualizar información**: Actualiza los datos de un profesor o empresa existente
   ![Descripción de la imagen](/public/images/imagen11.png)

- **Borrar Información**: Elimina un profesor o empresa existente
   ![Descripción de la imagen](/public/images/imagen12.png)

  **Autenticación de Profesores**: Permite a los profesores registrarse, iniciar sesión y cerrar sesión mediante un sistema de autenticación seguro.
  
- **Iniciar Sesión**
  ![Descripción de la imagen](/public/images/imagen5.png)

- **Obtención del usuario logueado a través del token**
   ![Descripción de la imagen](/public/images/imagen15.png)

- **Cerrar sesión**
 ![Descripción de la imagen](/public/images/imagen16.png)

 **Login**: Se ha implementado un login con jetstream para registrar a los profesores y dentro de su panel pueden añadir observaciones de sus alumnos tambien tienen un panel para gestionar apartados de su cuenta.

- **Inicio**
  ![Descripción de la imagen](/public/images/imagen17.png)

- **Iniciar sesión**
   ![Descripción de la imagen](/public/images/imagen18.png)

- **Registrarse**
   ![Descripción de la imagen](/public/images/imagen19.png)

- **Vista notas**
   ![Descripción de la imagen](/public/images/imagen20.png)
   
- **Editar notas**
   ![Descripción de la imagen](/public/images/imagen22.png)
   
- **Panel de control de usuario**
   ![Descripción de la imagen](/public/images/imagen21.png)

  
 
## Estructura del Proyecto

La estructura del proyecto sigue la estructura estándar del framework Laravel:

```text
Laravel_Proyecto_FPDual/
├── .editorconfig
├── .env
├── .env.example
├── .gitattributes
├── .gitignore
├── .phpunit.result.cache
├── app/
│   ├── Actions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── API/
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── CompanyApiController.php
│   │   │   │   └── ProfessorApiController.php
│   │   │   ├── CompanyController.php
│   │   │   ├── ProfessorController.php
│   │   │   └── Controller.php
│   │   ├── Middleware/
│   │   └── Requests/
│   │       ├── AuthRequest.php
│   │       ├── CompanyRequest.php
│   │       └── ProfessorRequest.php
│   ├── Models/
│   │   ├── Company.php
│   │   └── Professor.php
│   ├── Policies/
│   ├── Providers/
│   └── Resources/
│       ├── AuthResource.php
│       ├── CompanyResource.php
│       └── ProfessorResource.php
├── artisan
├── bootstrap/
│   ├── app.php
│   └── cache/
│       └── providers.php
├── composer.json
├── composer.lock
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   └── ...
├── database/
│   ├── factories/
│   │   ├── CompanyFactory.php
│   │   └── ProfessorFactory.php
│   ├── migrations/
│   │   ├── 2023_01_01_000000_create_companies_table.php
│   │   ├── 2023_01_01_000001_create_professors_table.php
│   │   └── ...
│   └── seeders/
│       ├── CompanySeeder.php
│       └── ProfessorSeeder.php
├── package.json
├── phpunit.xml
├── postcss.config.js
├── public/
│   ├── css/
│   ├── js/
│   └── images/
├── README.md
├── resources/
│   ├── css/
│   ├── js/
│   ├── lang/
│   └── views/
│       ├── companys/
│       │   ├── create.blade.php
│       │   ├── index.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       ├── professors/
│       │   ├── create.blade.php
│       │   ├── index.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       └── layouts/
│           └── app.blade.php
├── routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── storage/
│   ├── app/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   ├── testing/
│   │   └── views/
│   └── logs/
├── tailwind.config.js
├── tests/
│   ├── Feature/
│   │   ├── CompanyTest.php
│   │   └── ProfessorTest.php
│   └── Unit/
│       ├── CompanyUnitTest.php
│       └── ProfessorUnitTest.php
├── vendor/
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
  - **README.md**: Mejoras en el README.md con imagenes y explicaciones

**Implementación de Jetstream**:
  - **Profesores**: Ahora los profesores se pueden crear y registrarse desde Jetstream y la API de `AuthController` funciona junto con esto.
  - **Vistas personalizadas**: Para cada profesor hay una vista personalizada que permite hacer observaciones sobre los alumnos implementando un CRUD para las notas.
  - **Panel personalizado**: Para cada profesor hay un panel personalizado que permite gestionar las contraseñas, cambiar email y demás funcionalidades.
  
**Seguridad**
  - **Inyección**: Se han implementado medidas de seguridad en los formularios de login para evitar inyecciones de código.

**Testing**:
  - **API**: Realización de Test feature para las clases de las API.
