# Laravel: Notes App

A simple application to demonstrate CRUD operations in Laravel.

## Introduction

Notes application allows users to create, read, update and delete text notes. It also incorporates user authentication, that allows multiple users to access the application and create their own notes.

The application uses Laravel Breeze to implement authentication logic as well as UI. When you use Laravel Breeze, you're integrating its pre-built authentication components into your application. These components include:

-   User registration
-   User login
-   Password reset
-   Email verification

Breeze simplifies the process of setting up these features by providing ready-to-use routes, controllers, views, and other necessary files. This saves you time and effort compared to building these components from scratch.

## Software Required

1. PHP 8.1.6 (included in XAMPP version 3.3.0)
2. MySQL 8.1.6 (included in XAMPP version 3.3.0)
3. Visual Studio Code / PhpStorm IDE
4. NodeJS 18.12.1 (or latest)
5. Composer 2.4.1 (or latest)

### Recommended VS Code Extentions

1. PHP Intelephense (Ben Mewburn)
2. Laravel Artisan (Ryan Naddy)
3. Laravel Blade Snippets (Winnie Lin)
4. Laravel Extra Intellisense (amir)
5. es6-string-html

## Procedure

1.  Create a new Laravel project using command

        composer create-project laravel/laravel notes-app

2.  Update .env file with the following database details.

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=notes-app
        DB_USERNAME=root
        DB_PASSWORD=

3.  Migrate the database using the command

        php artisan migrate

    **Note: Make sure to start the Apache and MySQL service from XAMPP control panel before migrating.**

4.  Add Laravel Breeze to the project and install it

        composer require laravel/breeze --dev
        php artisan breeze:install

    You'll be provided options to select the stack. We have used Blade.
    Next you have option to enable support for dark mode.
    And last, you can choose the testing framework. We chose PHPUnit.

5.  Now create the required views and components to display/create/update notes.

6.  Create the Note model, migration and controller.

        php artisan make:model Note -mc

    This will create 3 files: the `Note` model, the `create_notes_table` migration and `NoteController` controller.

7.  Define table schema in migration file.
8.  Define fillable variables, `title` and `note` in `Note` model.
9.  Define eloquent relationships in `Note` and `User` models. `Note` has a `belongsTo` relationship with `User` model, whereas, `User` has a `hasMany`
    relationship with `Note` model. This is necessary to bind a note to a user and vice-versa.

10. Define methods in `NoteController` to control the notes. Important methods include:

-   `index()` - Renders home page will all notes created by the signed in user.
-   `create()` - Renders page that includes form to create a new note.
-   `store()` - Stores the new note to database.
-   `show()` - !Not Implemented (Can be used to fetch one of the notes by ID)
-   `edit()` - Renders the form to edit a note by ID
-   `update()` - Updates a given note based on ID
-   `destroy()` - Deletes the note based on ID

11. Define appropriate routes in `web.php` file to carry out above actions.
12. Make the views dynamic by injecting data on-the-fly using various blade directives.

## Running the application

In a terminal window, run the following:

    npm run dev

In a separate terminal, run the following:

    php artisan serve

Open a web browser and navigate to http://localhost:8000

## Installing and Running this Completed Code

1.  Clone this repository

        git clone https://github.com/ForgottenLight4415/notes-app.git

2.  Go to `notes-app` directory

        cd notes-app

3.  Install composer dependencies

        composer install

4.  Install node dependencies

        npm install

5.  Create `.env` file as it is ignored in `.gitignore` and copy the contents of `.env.example` to it.

6.  Update following fields in `.env` file.

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=notes-app
        DB_USERNAME=root
        DB_PASSWORD=

7.  Generate application key

        php artisan key:generate

8.  Run the migration

        php artisan migrate

9.  Run the app

    In separate terminals, run the following commands:

        npm run dev
        php artisan serve

10. Navigate to http://localhost:8000 in a web browser.

11. Explore various features of the app.
