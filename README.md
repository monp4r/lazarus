<p align="center">
    <a href=""><img src="https://github.com/monp4r/lazarus/blob/053a463f43905133a3b8ab3f2938836d9f39d447/public/img/lazarus_logo.svg" width="100px"></a>
</p>

<h1 align="center"><p align="center">LAZARUS</h1></h1>

<p align="center" id="badges">
    <a href="https://github.com/monp4r/lazarus/blob/master/LICENSE"><img src="https://img.shields.io/github/license/monp4r/lazarus" alt="License"></a> <a href="#"><img src="https://img.shields.io/github/languages/code-size/monp4r/lazarus" alt="Code size"></a> <a href="https://github.com/monp4r/lazarus/commits"><img src="https://img.shields.io/github/last-commit/monp4r/lazarus" alt="Last commit"></a>
</p>

> Created by **Juan Francisco Montero Parejo** 
# LAZARUS

  Proyecto Tecnologías Web 2022/2023           
                                               
  Creado por Juan Francisco Montero Parejo.

  Universidad de Valladolid                   

  <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.


CUESTIONES DE IMPLEMENTACIÓN RESEÑABLES
---------------------------------------

  Esta aplicación se ha creado siguiendo el patrón Modelo Vista Controlador, intentando separar de forma adecuada la lógica de negocio de nuestra aplicación y su visualización.

  Se han creado cuatro controladores para llevar a cabo todas las funciones de la aplicación. Estos se dedican a manejar el seguimiento entre usuarios, la página principal de la aplicación, los mensajes enviados de los usuarios y los propios usuarios.

  Sin embargo, considero que se podrían unificar estos controladores en un único controlador que gestione los usuarios ('UsersController').

## Folders (and index file)

| Folder | Description |
| --- | --- |
| [`config`](./config) | Contains configuration elements that may vary throughout the application's lifetime, such as credentials for connecting to the database. |
| [`controllers`](./controllers) | Houses the application's controllers mentioned earlier. |
| [`inc`](./inc) | Includes subdirectories and their respective functionalities: |
| [`components`](./inc/components) | Stores components frequently used in the application. |
| [`helpers`](./inc/helpers) | Holds files providing various functionalities, from data input validation to image uploading. |
| [`templates`](./inc/templates) | Stores templates used to avoid repetitive code. |
| [`models`](./models) | Stores the models necessary for the MVC pattern to work with all application data. |
| [`views`](./views) | Contains code responsible for loading the visualization of different interfaces. Local storage for images used in the application, including profile and message images. |
| [`public`](./public) | Stores all resources related to the application's views, including the jQuery library and plugins, JS validation files, stylesheets, icons, logos, etc. |
| [`index.php`](./index.php) | Main file for redirecting to various controllers based on session variable activation. |

