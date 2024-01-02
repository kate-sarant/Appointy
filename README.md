# Appointy App

This Appointy app is a simple Laravel application that allows users to book appointments.

## Features
- Register and login .
- Users can create, view, and cancel appointments.
- The app is responsive and works on all devices.

## Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL database

## Installation

1. Clone the repository:

- git clone https://github.com/kate-sarant/Appointy.git


2. Navigate to the project directory:

-  cd appointy-app


3. Install the dependencies:

-  npm install 
-  composer install



4. Create a database and run the migrations:

- .env Update

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=appointy
    DB_USERNAME=root
    DB_PASSWORD=

- php artisan migrate


5. Seed the database with some dummy data:

-  php artisan db:seed


6. Start the development server:

- php artisan serve


## Usage

To use the app, simply visit the `/` route in your browser. You can then create an account and start booking appointments.

## Git Pull

To update your local copy of the app with the latest changes from GitHub, simply run the following command:

git pull


This will fetch the latest changes from the remote repository and merge them with your local changes.

## Contributing

Contributions are welcome! Please read the [contributing guidelines](https://github.com/your-username/appointy-app/blob/main/CONTRIBUTING.md) before submitting a pull request.

## License

This project is licensed under the MIT License.