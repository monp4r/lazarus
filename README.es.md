<p align="center">
    <a href=""><img src="https://github.com/monp4r/lazarus/blob/053a463f43905133a3b8ab3f2938836d9f39d447/public/img/lazarus_logo.svg" width="100px"></a>
</p>

<h1 align="center"><p align="center">LAZARUS - Una aplicación web en PHP inspirada en Twitter<</h1></h1>
<p align="center" id="badges">
    <a href="https://github.com/monp4r/lazarus/blob/master/LICENSE"><img src="https://img.shields.io/github/license/monp4r/lazarus" alt="License"></a> <a href="#"><img src="https://img.shields.io/github/languages/code-size/monp4r/lazarus" alt="Code size"></a> <a href="https://github.com/monp4r/lazarus/commits"><img src="https://img.shields.io/github/last-commit/monp4r/lazarus" alt="Last commit"></a> 
</p>

> Creado por **Juan Francisco Montero Parejo** (<https://github.com/monp4r/>)

## Resumen

Lazarus es una aplicación web dinámica en PHP, inspirada en el patrón de arquitectura Modelo-Vista-Controlador (MVC). Desarrollada como parte de un trabajo para una asignatura en mi doble grado en matemáticas e ingeniería informática en la Universidad de Valladolid, este proyecto encarna el espíritu de una experiencia similar a la de Twitter.

## Aspectos destacados de la implementación

### Patrón de diseño: Modelo-Vista-Controlador (MVC)

Lazarus adopta el patrón arquitectónico MVC, separando meticulosamente la lógica empresarial de la presentación para crear una base de código robusta y modular.

### Controladores

La aplicación cuenta con controladores especializados para funcionalidades distintas:

- **UsersController:** Gestiona operaciones relacionadas con usuarios.
- **IndexController:** Gobierna la página principal de la aplicación.
- **MessagesController:** Controla los mensajes enviados por los usuarios.
- **FollowController:** Gestiona características de seguimiento de usuarios.

### Consolidación de controladores

Se ha considerado la consolidación de controladores en una entidad unificada, como el propuesto 'UsersController', con el objetivo de optimizar la base de código y mejorar la mantenibilidad.

## Empezar

Para embarcarte en la experiencia Lazarus:

1. Clona el repositorio: `git clone https://github.com/your-username/lazarus.git`
2. Navega al directorio del proyecto: `cd lazarus`
3. Configura un servidor local (por ejemplo, usando el servidor incorporado de PHP): `php -S localhost:8000`
4. Abre tu navegador web y visita [http://localhost:8000](http://localhost:8000)

## Contribuciones

Sé parte del viaje Lazarus:

1. Haz un fork del repositorio en GitHub.
2. Crea una nueva rama para tu funcionalidad o corrección de errores: `git checkout -b feature/nueva-funcionalidad`.
3. Realiza tus cambios: `git commit -m "Agregar nueva funcionalidad"`.
4. Haz push a tu rama: `git push origin feature/nueva-funcionalidad`.
5. Envía una solicitud de extracción (pull request).

## Licencia

Este proyecto está bajo la [Licencia MIT](https://github.com/monp4r/lazarus/tree/master?tab=MIT-1-ov-file).

## Reconocimientos

Quiero expresar mi sincero agradecimiento a los profesores de la Universidad de Valladolid que brindaron su apoyo y conocimientos durante mi educación. Su dedicación y enseñanzas fueron fundamentales en el desarrollo de este proyecto, que encarna el espíritu de una experiencia similar a la de Twitter.

¡Explora, mejora y contribuye a la aplicación web Lazarus en PHP con arquitectura MVC similar a Twitter!

## Estructura del directorio del proyecto

| Carpeta                           | Descripción                                                                                                                                                              |
| --------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| [`config`](./config)               | Contiene elementos de configuración que pueden variar a lo largo de la vida de la aplicación, como credenciales para la conexión a la base de datos.                   |
| [`controllers`](./controllers)     | Alberga los controladores de la aplicación mencionados anteriormente.                                                                                                    |
| [`inc`](./inc)                     | Incluye subdirectorios y sus respectivas funcionalidades:                                                                                                                |
| [`components`](./inc/components)   | Almacena componentes utilizados con frecuencia en la aplicación.                                                                                                         |
| [`helpers`](./inc/helpers)         | Contiene archivos que proporcionan diversas funcionalidades, desde la validación de la entrada de datos hasta la carga de imágenes.                                       |
| [`templates`](./inc/templates)     | Almacena plantillas utilizadas para evitar la repetición de código.                                                                                                      |
| [`models`](./models)               | Almacena los modelos necesarios para que el patrón MVC funcione con todos los datos de la aplicación.                                                                    |
| [`views`](./views)                 | Contiene el código responsable de cargar la visualización de diferentes interfaces. Almacena imágenes utilizadas en la aplicación, incluidas las de perfil y mensajes.|
| [`public`](./public)               | Almacena todos los recursos relacionados con las vistas de la aplicación, incluida la biblioteca jQuery y complementos, archivos de validación JS, hojas de estilo, iconos, logotipos, etc.|
| [`construccionDB.sql`](./construccionDB.sql)       | Fichero SQL de construcción de la BD de la aplicación            |
| [`index.php`](./index.php)         | Archivo principal para redirigir a varios controladores según la activación de la variable de sesión.                                                                   |
