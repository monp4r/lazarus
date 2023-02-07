# LAZARUS

|-----------------------------------------------|
|  Proyecto Tecnologías Web 2022/2023           |
|                                               |
|  Creado por Juan Francisco Montero Parejo.    |
|                                               |
|  Universidad de Valladolid                    |
|                                               |
|  Campus María Zambrano, Segovia, España       |
|_______________________________________________|

-- PÁGINA WEB DEL PROYECTO --
-----------------------------
  - Versión HTTP:  http://virtual.lab.infor.uva.es:62282/~monpar/lazarus/
  
  - Versión HTTPS: https://virtual.lab.infor.uva.es:62283/~monpar/lazarus/


-- CREDENCIALES ACCESO --
-------------------------

  - Servidor Apache: 
      Usuario:    fdiaz
      Contraseña: vs179onL
  
  - PhpMyAdmin (Base de datos - lazarus):
      Dirección:  https://virtual.lab.infor.uva.es:62283/phpmyadmin/index.php
      Usuario:    fdiaz
      Contraseña: vs179onL

  - Página web Lazarus:
      Alias:    fdiaz
      Email:      fdiaz@uva.es
      Contraseña: vs179onL


-- CUESTIONES DE IMPLEMENTACIÓN RESEÑABLES --
---------------------------------------------

  Esta aplicación se ha creado siguiendo el patrón Modelo Vista Controlador, intentando separar de forma adecuada la lógica de negocio de nuestra aplicación y su visualización.

  Se han creado cuatro controladores para llevar a cabo todas las funciones de la aplicación. Estos se dedican a manejar el seguimiento entre usuarios, la página principal de la aplicación, los mensajes enviados de los usuarios y los propios usuarios.

  Sin embargo, considero que se podrían unificar estos controladores en un único controlador que gestione los usuarios ('UsersController').


-- ORGANIZACIÓN DE FICHEROS FUENTES EN LAS CARPETAS DE LA APLICACIÓN - Carpeta "/home/monpar/public_html/lazarus" --
--------------------------------------------------------------------------------------------------------------------

  Se ha tomado la decisión de escribir casi todo el código fuente de la aplicación en inglés por objetivos de aprendizaje propios del alumno.

  La organización de ficheros se dispone de la siguiente forma:

    - Directorio config: en este se sitúan elementos de configuración que pueden ser variables a lo largo del tiempo de vida de la aplicación. Por ejemplo, las credenciales de acceso a la BD a la que nos conectamos.

    - Directorio controllers: en este se sitúan los controladores de la aplicación mencionados anteriormente.

    - Directorio inc:

        - Directorio components: aquí se almacenan componentes utilizados en la aplicación con bastante frecuencia.

        - Directorio helpers:    en este directorio se almacenan ficheros que aportan diversas funcionalidades a la aplicación, desde la comprobación de la entrada de datos hasta subir imágenes.
        
        - Directorio templates:  en este directorio se almacenan las plantillas que se utilizan para intentar no repetir el mismo código varias veces.

    - Directorio models: aquí se almacenan los modelos del patrón MVC necesarios para trabajar con todos los datos de la aplicación.

    - Directorio views: contienen el código de nuestra aplicación que tendrá el objetivo de cargar la visualización de las distintas interfaces de nuestra aplicación. También trabajamos con datos, pero únicamente accediendo a ellos. Cabe destacar que en este directorio se almacenan de forma local las imágenes que se van a tratar en nuestra aplicación (tanto imágenes de perfil como de mensajes).

    - Directorio public: aquí se almacenan todos los recursos relacionados con las vistas de la aplicación: biblioteca de JQuery y sus plugins, ficheros JS de validación, hojas de estilo, iconos, imágenes de logos, ...

    - Fichero index.php: desde este fichero realizaremos redirecciones a los distintos controladores dependiende si se han activado variables de sesión.
