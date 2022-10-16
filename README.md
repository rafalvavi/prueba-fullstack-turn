<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instrucciones

- Crear base de datos en mysql con el nombre de "examen1" y despues importar la base de datos que se encuenta en la carpeta <b>public</b>.
- Configurar las variables de entorno en el archivo <b>.env</b>, en este caso solo ocupamos las de conexion a base de datos.
- Ejecutar el comando <b>php artisan serve</b> en la terminal desde la raiz del proyecto.
- Ejecutar el comando <b>php artisan db:seed</b> en la terminal desde la raiz del proyecto, esto creara el usuario admin y llenara las tablas de <b>codigos_postales, estados, ciudades y colonias</b> desde las listas en las hojas de calculo proporcionadas.
- Entramos en la siguiente url [http://localhost:8000/login](http://localhost:8000/dashboard/mayoristas/create) para ingresar con las credenciales <b>user:</b> admin@admin.com <b>password:</b> control.

