# Rumah Jurnal - Project Setup Instructions

Follow the steps below to set up and run the project locally.

## Cloning the Project

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/hagendodo/lostfound-laravel
    ```

2. Navigate to the project directory:
    ```bash
    cd lostfound-laravel
    ```

## Install Dependencies

3. Run the following command to install all the dependencies:
    ```bash
    composer install
    ```

## Environment Setup

4. Copy the `.env.example` file to `.env`:

    - For Windows (Command Prompt):
        ```bash
        copy .env.example .env
        ```
    - For MacOS/Linux (Terminal):
        ```bash
        cp .env.example .env
        ```

5. Open your `.env` file and configure the database:
    - Change the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` fields to match your local database setup.

## Generate Application Key

6. Run the following command to generate the application key:
    ```bash
    php artisan key:generate
    ```

## Database Migration

7. Run the following command to migrate the database:
    ```bash
    php artisan migrate
    ```

## Serve the Application

8. Start the application with the following command:

    ```bash
    php artisan serve
    ```

9. Access the application at: [http://localhost:8000](http://localhost:8000)

That's it! The project should now be up and running locally.
