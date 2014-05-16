Alba 2 - Sistema de Gestión Educativa (pre-alpha)
=================================================

Instalación:
------------

Clonar el repo y dar permisos a algunos directorios:

~~~
$ git clone https://github.com/proyectoalba/alba2.git
$ cd alba2/
$ chmod 777 runtime/ web/assets/ -R
~~~

Instalar las librerías necesarias:

~~~
$ ./composer.phar install
~~~

Configuración:
--------------

#### Base de datos: 

Crear la base de datos para el sistema (MySql):

~~~
$ mysql -u root -p
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 7
Server version: 5.5.31 Source distribution

Copyright (c) 2000, 2013, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create database alba2 default character set utf8;

Query OK, 1 row affected (0,00 sec)

mysql> exit
Bye
$
~~~

#### Aplicación: 

Copiar el archivo  `config/db.php.dist` a `config/db.php`.
Crear una base de datos mysql para el sistema (por defecto llamada `alba2`).
Editar el archivo `config/db.php` con los datos necesarios de conexión a la misma.

#### Carga de datos incial:

Desde la terminal, ir al directorio de la aplicación y ejecutar el comando `./yii migrate`:

~~~
$ ./yii migrate
Yii Migration Tool (based on Yii v2.0-dev)

Creating migration history table "tbl_migration"...done.
Total 1 new migration to be applied:
    m131209_185713_setup

Apply the above migration? (yes|no) [no]:yes
*** applying m131209_185713_setup
*** applied m131209_185713_setup (time: 10.506s)


Migrated up successfully.
$ 
~~~

#### Agradecimientos por la colaboración y análisis (y paciencia): 
* Sebastián Fameli
* Nicolás Farías
* Dante Bravo
* Blás López
* Silvina Ibaldi
* Oscar Zalazar
