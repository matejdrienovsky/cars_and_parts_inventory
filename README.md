# Cars and Parts Inventory - Laravel App
Welcome to the Cars and Parts Inventory Application. This project is designed to efficiently manage car and car parts inventory utilizing Laravel 11.9 with PHP 8.2 and a MySQL database.

# Configuring and Running the Application
This guide will walk you through the steps to configure and run the Cars and Parts Inventory Application on your local machine.

## Installation
**Prerequisites:** To run this project, ensure you have the following technologies installed on your system: `Laravel`, `PHP` and `Composer`.

1. **Clone the Repository:** Clone the repository to your local machine using the following command:
    ```bash
      git clone git@github.com:matejdrienovsky/cars_and_parts_inventory.git
    ```

2. **Move into the Project:** Move into the project directory

3. **Install Dependencies:** Install all necessary packages with Composer:
    ```bash
    composer install
    ```
## Database Configuration
By default, this application uses a MySQL database. To utilize a different database type,
navigate to `config/Database.php` and alter the default driver.

To configure MySQL:

1. **Install MySQL:** Ensure MySQL is installed on your system.

2. **Create a database:** Set up your MySQL database.

3. **Configure Database Credentials:** Insert your database credentials (`DB_DATABASE`,
   `DB_USERNAME`,`DB_PASSWORD`) in the `.env.example` file.

4. **Rename the .env.example:** Rename the .env.example file to .env


### Setting up the Database
Application's database consists of pre-defined tables and columns that can be set up through migrations by running:
```bash
php artisan migrate
```

### Seeding The Database
The application comes with dummy data for initial testing. To seed the database with this data, run the following command:
```bash
php artisan db:seed
```

### Running The App
Once you have completed the above steps, start the application by running:
```bash
php artisan serve
```
Now, you can access the application in your web browser at http://localhost:8000.

##
By following these steps, you'll have the Cars and Parts Inventory Application up and running smoothly. 
For more detailed information, please refer to the official [Laravel documentation.](https://laravel.com/docs/11.x)
