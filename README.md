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
     
     Instalamos laravel/ui con el comando: ***composer require laravel/ui --dev***

     Ahora mediante laravel ui instalamos boostrap y vue mediante el comando: ***php artisan ui vue***

     A continuación volvemos a ejecutar npm para instalar todas las dependencias: ***npm install***

     Por último ejecutamos el siguiente comando que nos genera los archivos css y js en la carpeta public: ***npm run dev***

     **NOTA:** si nos salta error volvemos a ejecutar el comando por segunda vez.

     Agregamos las dependencias de bootstrap y js mediante blade a nuestra vista create.

- Añadiendo reglas de validación a nuestro formulario de post
     
     Añadimos las reglas de validación de los campos del formulario post y sus mensajes mediante blade.

     Generando layout de post en dashboard > master.blade.php.

- Modularizando la validación de errores

     Creamos un nueva vista llamada validation-error.blade.php en la carpeta dashboard/partials en el cual vamos a rellenar con nuestro código blade de validación del post y el mismo lo incluimos mediante blade a nuestra vista create de post.

- Pasando datos de post a la base de datos:

     Creamos modelo Post y añadimos la propiedad fillable con los datos que queremos pasar.

     Creamos un request mediante linea de comandos: ***php artisan make:request StorePostPost*** el nombre se debe a que el store es el método que va a emplear esta validación, post es el modelo y post es el tipo petición . 

     Dentro del StorePostPost le pasamos nuestras reglas de validación y autorizamos el acceso retornando un true al metodo autorize().

     En nuestro controlador de post PostController tenemos que inyectar las reglas de validación de nuestro request StorePostPost, entonces al metodo store le pasamos como primer parámetro StorePostPost (quitando Request) e importamos la clase.

     Dentro del método store, mediante Post accedemenos al metodo stático create y le pasamos los datos validados de nuestro request, consiguiendo de esta manera que se manden los datos a la tabla posts que tenemos en nuesta base de datos.

     En este punto nos surge otro problema y es que al enviar el formulario se nos retorna una página en blanco, para solucionar esto redireccionamos a la vista de create, para ello nos situamos en PostController->store y añadimos un return back() consiguiendo asi que retorne atrás hacia la vista create y para que se nos muestre un mensaje de confirmación ustilizamos el método with('status', 'message'); en donde message sería el mensaje que nosotros pondríamos, para visualizarlo generamos un condicional con la session('status') en la vista master de Post .

- Creando navbar y modularizando la web

     Mediante boostrap creamos nuestro navbar en el documento views>dashboard>partials>nav-header-main.php y lo incluimos en el archivo master.blade.php ubicado en dashboard>post.

     Modularizamos la validación de sesion y la pasamos a dashboard>partials>validation-error.blade.php y la incluimos en master.blade.php

     Dentro del narvar linkeamos la ruta a nuestra vista index de post en la cual nos mostrará todos los posts que existan.

- Creando vista index post

     Creamos la vista index.blade.php en reources>views>dashboard>post 

     Mediante el PostController en el metodo index retornamos la vista previamente creada y le enlazamos los posts.

     En la vista generamos una tabla para mostrar los posts y le agregamos un botón para crear un post mediante blade.

- Paginación de posts

     En el post controller->index añadimos a $posts el paginate(), luego en el index de post agregamos los links para la paginación.
     Editamos la pginación en bootstrap(public/css/app.css)

- Guardar información del formulario en caso de error para no tener que volver a escribirla

     La haremos mediante el metodo Old de laravel, nos dirigimos a la vista create de post y mediante el value de los imput escribimos en codigo blade el metodo old para cada campo, excepto en el text area que lo intriducimos directamente como valor de la misma etiqueta.

- Mostrar información en la vista show de post

     En el post controller dentro de show inyectamos el parámetro Post y retornamos la vista show y el post correspondiente, además agregamos los values correspondientes dentro de la vista show.

- Editar un post

     Creamos la vista edit.blade.php, modularizamos el formulario de manera que la cabecera del mismo la editamos en cada archivo dado que create también va a hacer uso del formulario y de esta forma podemos tener actions diferentes.

     En el action del formulario de la vista edit, añadimos la ruta junto con el post y su id, ademas agregamos el metodo en envío put de laravel mediante las directvias de laravel, dado que php nativo no cuenta con el metodo put.

     Nos ubicamos ahora en el PostController y en el método de edit inyectamos como parametro el Post y retornamos la vista junto con el post.

     Dentro de PostController nos hubicamos en el método update al cuál le inyectamos como parametro Post para no tener que consultar el post y cambios el request por el StorePosstPost consiguiendo así que tengamos las reglas de validaciones que generamos anteriormente.

     A continucación añadimos nuestro Post con el metodo update y retornamos el mensaje de confirmación de actualización del mismo.

     Ahora vamos a nuestro _form y los values de los imputs también retornamos el valor actual de cada campo, dado que desde la vista edit le hemos pasado dichos valores, con esto conseguimos que se nos vea los valores por defecto del post.

     Por último nos dirigimos al PostController al método create y le pasamos una nueva instancia de post a nuestra vista, por que si no cuando vayamos a crear un post se nos genera un error.

- Borrar un post

     Para ello nos situamos en el index, pero en vez de ser un boton, tenemos que hacer un formulario dado que hay que especificar el metodo delete de laravel y por ello lo haremos mediante un formaulario y dentro del mismo generamos el método delete de laravel y le agregamos un boton tipo submit con las clases de bootstrap, ademas de añadir la ruta del delete al action del formulario y el token csrf de seguridad.

     Dentro de PosController en el método destroy inyectamos como parámetro nuestro Post para no tener que consultar el identificardor del post y a la variable post le pasamos el metodo delete.

     Añadimos el retorno de la pagina junto con el mensaje de confirmación del mismo.

     A modo de seguridad vamo a agregar un modal de bootstrap el cual nos pregunte si estamos seguros de eliminar el post. Para ello copiamos el código de bootstrap y lo pegamos en nuestro index de post con el script incluido.

     Cambiamos las id del modal y en el boton cambiamos el data-whatever por data-id y mediante blade pasamos el post->id, cambiamos los mensaje y mediante jquery captamos ls id de cada post.

- Creación de categorías

     Creamos el CategoryController, su modelo Category y su request StoreCategoryPost.

     Copiamos la carpeta post y la renombramos como category.

     Editamos todas las vistas y cambiamos los nombres mediante Ctrl + h(en visual estudio code), en donde post es igual a category y posts es igual a categories.

     En en el controlador CategoryController copiamos el index de PostController y le cambiamos los nombres en donde post es igual a category y posts es igual a categories.

     En el StoreCategoryPost en las reglas de validación las copiamos de StorePostPost y quitamos el content y pasamos a true el método autorize().

     En el modelo Category agregamos el fillable.

- Instalación de plugin CKEditor

     CKEditor es un plugin que enrriquece el text area de nuestro formulario post.

     Intalación: mediante la línea de comandos ingresamos el siguiente código: npm install --save @ckeditor/ckeditor5-build-classic.

     Lo añadimos a resources>js>app.js.

     Ejecutamos npm run dev para volcar nuestros cambios al js publico.

     Más adelante configuraremos la subida de imagenes del mismo.

- Relación muchos a muchos entre category y posts

     Para ello nos vamos a los modelos de cada uno, dentro del modelo post generamos una función cuyo nombre es categories en la que especificamos que
     que un post puede pertenecer a muchas categorias y ademas en este caso especificamos el nombre de la tabla pivote y sus campos category_id y post_id. Realizamos la misma operación en el modelo de Category pero en este caso la función que generamos se va a llamar posts en la cuál especificamos que una categoría puede pertenecer a muchos posts.

- SoftDeletes

     Si en algún momento eliminamos algo que no queríamos eliminar se podría recuperar mediante el softdelete.

     Para ello generamos una nueva columna en las tablas llamada $table->softDeletes(), luego nos dirigimos al modelo de cada tabla y hacemos uso de softDeletes (use SoftDeletes) e importamos la clase, ahora cada vez que eliminemos algo nos saldrá una fecha de eliminación del registro y si esta la ponemos a null volveremos a recuperar el registro eliminado.

- Generando campo categorias en el formulario de post

     Para ello nos dirigimos al postcontroller y tanto en la vista edit como create mediante el método pluck captamos la id y el titulo de las categorías y los mismos los pasamos a la vista.

     Agregamos los cdn de Select2.

     Nos vamos a la vista _form de post y generamos el imput de Select2 de categories, mediante un forelse nos recoremos las categorías y las mostramos.

     Para sincronizar las categorías con la base de datos usamos el metodo sync.

- Generando campo posted

     Creamos una vista en partials llamado option-yes-not.blade.php dado que esto puede que lo utilicemos más adelante, en ella colocamos unicamente los options y en el campo de yes le hacemos una pequeña validación de forma que si esta seleccionado yes se nos quede seleccionado, la incluimos en la vista _form y en la vista show y listo.

- Cargar una imagen como portada del post

     Generamos un formulario en la vista edit, dado que no queremos que cuando se cree un post se pueda colocar una imagen.

     Generamos la ruta en web.php

     Generamos la función image en PostController

     Para enviar la información a la base de datos crearemos una nueva tabla llamada create_post_images_table y la relacionamos con la tabla post.

- Módulo de autencicación

     Para generar nuestro módulo de autenticación haremos uso de Laravel ui, mediante el comando ***php artisan ui vue --auth***.

     Una vez hecho esto nos dirigimos al controlador RegisterController.php situado en app/Http/Controllers/Auth y añadimos a las reglas de validación el campo surname.

     Nos dirigimos al modelo de User y añadimo al fillable el campo surname.

     Nos dirigimos a la vista de register.blade.php situada en resources/views/auth y agregamos el campo de surname al formulario.

     Redireccionamos a la url raíz después de autenticarnos, para ello nos dirigimos a RouteServiceProvider.php y en la constante HOME le asignamos el valor de /. 

     Entro del dashboard generamos el logout, copiando el formulario logout de app.blade.php.

     Protegemos nuestro dashboard mediante un midleware(se ejecuta antes de cualquier método definido en el controlador), para ello copiamos el metodo __construnt de nuestro HomeController y este lo pegamos al inicio del PostController y del CategoryController, de esta forma si intentan acceder al dashboard primero saltará la ventana de autenticación.

- Roles de usuarios

     Para ello creamos una tabla llamada create_rols_table, en ella añadimos los campos de name y description y luego creamos los roles de Admin, Moderator y user de formar manual en nuestra base de datos.

     Creamos un modelo llamado Rol.

     En la tabla user agregamos el registro rol_id, y ahora en el modelo de post generamos la relación de uno a uno, es decir un suario tiene un rol.

     En el RegisterController, dentro del método create añadimos el campo rol_id y le pones el valor por defecto de 3 que sería el de usuario. 

     En el modelo de user añadimos al fillable el rol_id.

- Creamos un middleware para verificar el rol del usuario Admin

     Lo creamos mediente el comando: php artisan make:middleware CheckRolAdmin, y dentro de el mediante un codicional verificamos si la key es de admin y si no retornamos a la raíz.

     Lo agregamos al kernel.php en routeMidleware.

     Lo referenciamos a nuestros controladores de post y category dentro del metodo __construct.

- Creamos un gate para verificar el rol del usuario Moderador.

- Generamos el crud de usuarios

     Creamos su respectivo controlador de tipo resource, creamos su request con las reglas de validación corrrespondientes.

     Copiamos las vistas de category y remplazamos las variable categories por users y category por user, ademas modificamos los correspondientes campos del formulario.

     Para que no se nos muestre el campo password a la hora de actualizar el usuario desde el dashboard generamos un conficional if en blade y le ponemos de nombre pasw, en la vista create le pasamos ese condicional como true y en la edit como false así no se nos muestra el campo, ahora tenemos que generar un validador(request) proprio llamado UpdateUserPut.
     