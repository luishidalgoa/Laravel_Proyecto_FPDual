# Proyecto Laravel FPDual

## Acerca del Proyecto

Este proyecto es una aplicación web basada en Laravel diseñada para gestionar empresas y profesores. Proporciona funcionalidades para crear, leer, actualizar y eliminar (CRUD) registros tanto de empresas como de profesores.

## Características

- **Gestión de Empresas**: Administra registros de empresas incluyendo nombre, dirección, teléfono, correo electrónico y fecha de creación.
- **Gestión de Profesores**: Administra registros de profesores incluyendo nombre completo, edad, género, dirección, teléfono y correo electrónico.
- **Interfaz de Usuario**: Una interfaz amigable construida con Bootstrap para facilitar la navegación e interacción.

## Estructura del Proyecto

La estructura del proyecto sigue la estructura estándar del framework Laravel:

```md
# Proyecto Laravel FPDual

## Acerca del Proyecto

Este proyecto es una aplicación web basada en Laravel diseñada para gestionar empresas y profesores. Proporciona funcionalidades para crear, leer, actualizar y eliminar (CRUD) registros tanto de empresas como de profesores.

## Características

- **Gestión de Empresas**: Administra registros de empresas incluyendo nombre, dirección, teléfono, correo electrónico y fecha de creación.
- **Gestión de Profesores**: Administra registros de profesores incluyendo nombre completo, edad, género, dirección, teléfono y correo electrónico.
- **Interfaz de Usuario**: Una interfaz amigable construida con Bootstrap para facilitar la navegación e interacción.
```
## Estructura del Proyecto

La estructura del proyecto sigue la estructura estándar del framework Laravel:
```text
Laravel_Proyecto_FPDual/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── CompanyController.php
│   │       └── ProfessorController.php
│   ├── Models/
│   └── Providers/
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
````

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

## Licencia

Este proyecto es software de código abierto licenciado bajo la [licencia MIT](https://opensource.org/licenses/MIT).
```
