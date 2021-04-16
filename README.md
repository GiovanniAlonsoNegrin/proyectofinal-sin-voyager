<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Our Final Course Proyect

:octocat:

1. User registration and login.
2. In the publication you must allow comments from registered users.
3. Role control, with at least three levels, which calculates:
    - Administrator, full CRUD.
    - Moderator, CRUD in comments.
    - User, you could only edit your own comments and create new ones.
4. Valuation statistics of:
    - Each post, using visual scoring for the user. For example: little stars.
    - User activity in the corresponding posts.

* * * 

# **Our Log**

<p align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/200px-Laravel.svg.png"</p>

## PROYECTO FINAL LARAVEL


1. Instalación de laravel y Voyager mediante composer:
      Para ello instalamos laragon full version ya que viene con composer instalado y nos facilita mucho la tarea.
 
      [Laragon full version](https://laragon.org/download/index.html)
       
      Seguido de esto, actualizamos el composer y la versión de php del laragon a la 7.4.

 - Para actualizar composer arrancamos el laragon dandole clic en el botón iniciar, una vez arranchado los servicios abrimos el terminal que viene integrado en laragon, nos ubicamos en la ruta ***C:\laragon\bin\composer*** e insertamos los siguientes comandos:

      composer -V :este comando nos muestra la versión que tenemos de composer.

      php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

      php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

      php composer-setup.php

      php -r "unlink('composer-setup.php');"

 - Para actualizar la versión de php nos dirigimos a la web oficial de php para descargala:

      [VC15 x64 Thread Safe (2021-Mar-02 17:13:59) 7.4.16 Zip](https://windows.php.net/download#php-8.0)
      
      **NOTA:** descargaremos la versión 7.4.16 Thread Safe en formato Zip.

      Una vez descargado descomprimimos el archivo y lo pegamos en la carpeta **C:\laragon\bin\php**, una vez hecho esto nos ubicamos en nuestro laragon, paramos los servicios le damos clic en menu -> php -> version y seleccionamos la nueva versión instalada y arrancamos de nuevo los servicios.

 - ### **INSTALACIÓN DE LARAVEL**
      Nos dirigimos a la linea de comandos de laragon, nos ubicamos en la ruta **C:\laragon\www** e ingresamos el siguiente comando:

      composer global require laravel/installer :de esta forma instalamos las dependencias de laravel

      laravel :verificamos que lo tenemos instalado

      laravel new proyectoFinal :iniciamos el proyecto laravel
 
      **NOTA:** si en este punto tenemos un error podemos generar el proyecto mediante el siguiente comando:

      composer create-project laravel/laravel proyectoFinal.

      Además tenemos que ir al archivo .env dentro de laravel y configurar los siguientes parametros:
 
      - DB_DATABASE=proyectofinal
      - DB_USERNAME=root
      - DB_PASSWORD=

      Una vez dentro del proyecto nos dirimos a la url http://proyectoFinal.test/ para acceder al mismo.
 
 2. Github:
       Para user github primero debemos instalar Git en el sistema, para ello nos dirigimos a la web oficial de git, lo descargamos y lo instalamos:

       [Git](https://git-scm.com/downloads)

       Una vez realizada la instalación abrimos la linea de comandos de Git y nos dirigimos a la ruta en donde se encuentra el proyecto que queremos añadir a Git, una vez dentro usamos el siguiente comando:

       git init 
 
       Ahora nos dirigimos GitHub y nos creamos una cuenta, una vez hecho esto se nos mostrará una ventana inicial para enlazar nuestro repositorio copiamos el siguiente comando en nuestra linea de comandos git:

       git remote add origin git@github.com:GiovanniAlonsoNegrin/aproyectofinal.git
       
       **Nota:** en este caso estoy usando una conexión ssh previamente configurado.

       De esta manera ya enlazamos nuestro repositorio

       Dentro de GitHub añadiremos nuestro repositorio y ahora realizamos el push para mandar la información a GitHub

       git push -u origin master

3. Inicio de proyecto:
- Creamos los CRUDS de Posts, Categorías y Usuarios
     Para ello generamos las tablas y sus correspondientes migraciones.
     Creamos las tablas mediante la línea de comandos de laragon:
     - php artisan make:magration create_posts_table
     - php artisan make:magration create_categories_table
     Añadimos los campos correspondientes a cada tabla y ejecutamos el siguiente comando para generar las tablas en la base de datos:
     - php artisan magrate

- Creamos el controlador de los post mediante el comando:
     - php artisan make:controller dashboard/PostController

- Generamos la ruta de tipo resource en el archivo web.php
     Mediante el comando ***php artisan r:l*** podemos ver las rutas generadas.

- Creamos la vista para nuestro post/create en resources > views > dashboard > create.blade.php y la añadimos al metodo create del PostContoller para que nos retorne la misma.
     En la vista generamos un formulario para enviar el post.

     En el action del formulario, mediante blade agregamos la ruta de post.store

     Agregamos el token de seguridad de laravel, el cual sirve para proteger nuestra palicación de manera que no puedan insuflar codigo en el action.

- Instalando bootstrap en el proyecto
     Instalamos npm(Node Package Manager, el cual es el sistema de gestión de paquetes por defecto de node.js) con el comando: ***npm install***
     
     Instalamos laravel/ui con el comando: ***composer require laravel/ui --dev ***

     Ahora mediante laravel ui instalamos boostrap y vue mediante el comando: ***php artisan ui vue***

     A continuación volvemos a ejecutar npm para instalar todas las dependencias: ***npm install***

     Por último ejecutamos el siguiente comando que nos genera los archivos css y js en la carpeta public: ***npm run dev***

     **NOTA:** si nos salta error volvemos a ejecutar el comando por segunda vez.

     Agregamos las dependencias de bootstrap y js mediante blade a nuestra vista create.

     Añadimos las reglas de validación de los campos del formulario post y sus mensajes mediante blade.

     Generando layout de post en dashboard > master.blade.php.
