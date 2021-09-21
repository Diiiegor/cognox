# Cognox
## Pruba de desarrollo php

El proyecto está desarrollado usando las siguientes tecnologías

- laravel como framewrok de php
- Para los estilos no se usó ningún framework css, todas las hojas de estilo están en public/assets/css
- jQuery para el uso de algunos eventos y validaciones del lado del cliente

## Características

- Creación de cuentas propias
- Transferencias entre cuentas propias
- Inscripción de cuentas de terceros
- Transferencias a las cuentas de terceros inscritas
- Opción de activar e inactivar cuentas propias y de terceros

## Datos de prueba

El proyecto trae algunos usuarios de prueba generados, cada usuario trae 2 cuentas propias y varias cuentas de terceros inscritas, usuarios:

- Usuario: 101009998827    
  -Clave:  1899
- Usuario: 1053868999     
  -Clave: 1899
- Usuario: 99099928827     
  -Clave: 1899
- Usuario: 18882736621     
  -Clave: 1899

## Instalación

Instalar dependencias del proyecto

```sh
git clone https://github.com/Diiiegor/cognox.git
cd cognox
composer install
php artisan key:generate
```

Variables de entorno: se debe crear una base de datos MySQL e igualar la variable de entorno DB_DATABASE al nombre de la base de datos previamente creada, en mi caso la base de datos se llama cognox

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cognox
DB_USERNAME=root
DB_PASSWORD=
```


Luego de configurar las variables de entorno en el archivo .env se debe ejecutar el comando para correr las migraciones de base de datos
```sh
php artisan migrate:fresh --seed
```




## Iniciar entorno de pruebas

Abrir una terminal en el proyecto y ejecutar el siguiente comando

```sh
php artisan serv
```

Una vez ejecutado el comando anterior se puede ingresar a la siguiente url por medio del navegador e ingresar con alguno de los usuarios de prueba

```sh
127.0.0.1:8000
```


