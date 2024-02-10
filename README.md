<p align="center">
    <a href=""><img src="https://github.com/monp4r/lazarus/blob/053a463f43905133a3b8ab3f2938836d9f39d447/public/img/lazarus_logo.svg" width="100px"></a>
</p>

<h1 align="center"><p align="center">LAZARUS - A Twitter-Inspired PHP Web App</h1></h1>
<p align="center" id="badges">
    <a href="https://github.com/monp4r/lazarus/blob/master/LICENSE"><img src="https://img.shields.io/github/license/monp4r/lazarus" alt="License"></a> <a href="#"><img src="https://img.shields.io/github/languages/code-size/monp4r/lazarus" alt="Code size"></a> <a href="https://github.com/monp4r/lazarus/commits"><img src="https://img.shields.io/github/last-commit/monp4r/lazarus" alt="Last commit"></a>
</p>

> Created by **Juan Francisco Montero Parejo** (<https://github.com/monp4r/>)

## Overview

Lazarus is a dynamic PHP web application, inspired by the Model-View-Controller (MVC) pattern. Developed as part of a coursework for a subject in my double degree in mathematics at the University of Valladolid, this project embodies the spirit of a Twitter-like experience.

## Implementation Highlights

### Design Pattern: Model-View-Controller (MVC)

Lazarus adopts the MVC architectural pattern, meticulously separating business logic from presentation to create a robust and modular codebase.

### Controllers

The application features specialized controllers for distinct functionalities:

- **UsersController:** Manages user-related operations.
- **IndexController:** Governs the application's main page.
- **MessagesController:** Controls the messages sent by users.
- **FollowController:** Manages user tracking features.

### Controller Consolidation

Consideration has been given to consolidating controllers into a unified entity, such as the proposed 'UsersController,' aimed at streamlining the codebase and improving maintainability.

## Getting Started

To embark on the Lazarus experience:

1. Clone the repository: `git clone https://github.com/your-username/lazarus.git`
2. Navigate to the project directory: `cd lazarus`
3. Set up a local server (e.g., using PHP's built-in server): `php -S localhost:8000`
4. Open your web browser and visit [http://localhost:8000](http://localhost:8000)

## Contributing

Be part of the Lazarus journey:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bug fix: `git checkout -b feature/new-feature`.
3. Commit your changes: `git commit -m "Add new feature"`.
4. Push to your branch: `git push origin feature/new-feature`.
5. Submit a pull request.

## License

This project is licensed under the [MIT LICENSE](https://github.com/monp4r/lazarus/tree/master?tab=MIT-1-ov-file).

## Acknowledgments

I want to express my sincere gratitude to the professors at the University of Valladolid who provided their support and knowledge during my education. Their dedication and teachings were instrumental in the development of this project, which embodies the spirit of a Twitter-like experience.

Explore, enhance, and contribute to the Lazarus PHP MVC Twitter-Like Web Application!

## Project Directory Structure

| Folder                           | Description                                                                                                                                                              |
| -------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| [`config`](./config)             | Contains configuration elements that may vary throughout the application's lifetime, such as credentials for connecting to the database.                                 |
| [`controllers`](./controllers)   | Houses the application's controllers mentioned earlier.                                                                                                                  |
| [`inc`](./inc)                   | Includes subdirectories and their respective functionalities:                                                                                                            |
| [`components`](./inc/components) | Stores components frequently used in the application.                                                                                                                    |
| [`helpers`](./inc/helpers)       | Holds files providing various functionalities, from data input validation to image uploading.                                                                            |
| [`templates`](./inc/templates)   | Stores templates used to avoid repetitive code.                                                                                                                          |
| [`models`](./models)             | Stores the models necessary for the MVC pattern to work with all application data.                                                                                       |
| [`views`](./views)               | Contains code responsible for loading the visualization of different interfaces. Local storage for images used in the application, including profile and message images. |
| [`public`](./public)             | Stores all resources related to the application's views, including the jQuery library and plugins, JS validation files, stylesheets, icons, logos, etc.                  |
| [`construccionDB.sql`](./construccionDB.sql)       | SQL file that creates the Database of Lazarus                                                        |
| [`index.php`](./index.php)       | Main file for redirecting to various controllers based on session variable activation.                                                                                   |
