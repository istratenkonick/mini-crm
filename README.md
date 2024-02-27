# Mini-CRM Project

## Overview

This project is designed as a mini-CRM to manage companies and their employees. It features basic Laravel
authentication, CRUD functionality, and data stored using Laravel's ORM (Eloquent). This CRM allows an administrator to
manage companies and employees in a user-friendly interface.

## Features

- **Basic Laravel Auth:** Login functionality as an administrator.
- **Database Seeds:** A default user is created for initial login with credentials `admin@admin.com` / `password`.
- **CRUD Functionality:** Complete Create, Read, Update, and Delete functionality for managing companies and employees.
- **Database & Migrations:** Utilizes Laravel migrations for database schema creation with specific fields for companies
  and employees tables.
- **Storage:** Company logos are stored in `storage/app/public` and are accessible from the public directory.
- **Resource Controllers:** Uses Laravel's resource controllers with default methods like index, create, store, etc.
- **Validation:** Implements Laravel's validation function using Request classes for data integrity.
- **Pagination:** Incorporates Laravel's pagination for displaying lists of companies and employees, showing 10 entries
  per page.
- **Starter Kit & Theme:** Utilizes Laravel's starter kit for authentication and basic theming.

## Requirements

- Laravel 8.x
- PHP >= 7.4
- MySQL or another database supported by Laravel
- Composer for managing PHP packages

## Installation

1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/istratenkonick/mini-crm.git
2. Navigate to the project directory:
   ```bash
   cd mini-crm
3. Install Composer dependencies:
    ```bash
   composer install
4. Set up your .env file by copying .env.example and modifying it according to your environment settings:
     ```bash
   cp .env.example .env
5. Generate an application key:
    ```bash
    php artisan key:generate
6. Database Connection:
   Ensure your database connection is configured in the .env file.


7. Run Migrations:
    ```bash
    php artisan migrate
8. Seed the database:
    ```bash
    php artisan db:seed
9. Link storage to public for access to uploaded files:
    ```bash
   php artisan storage:link
10. Install Node.js dependencies:
    ```bash
    npm install
11. Compile assets:
    ```bash
    npm run dev
