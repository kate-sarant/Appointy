
# Appointy - Booking system with Laravel 


## Table of contents  🚀

  - [Project Setup Guide](#overview)
  - [The challenge](#The_challenge)
  - [Setup Instructions](#Setup_Instructions)
  - [Links](#links)
  - [Prerequisites](#Prerequisites)
  - [Author](#author)


## Project Setup Guide
Prerequisites
Node.js and npm installed
Composer installed
PHP and MySQL installed

### The_challenge

Users should be able to:

- Create profile,Login ,Logout functionality 
- Navigate to profile page and change the informations
- Book,Update ,Delete appointmets 
- Check appointments from Fullcalendar panel
- Resive email with the appoinment after booking or update

## Setup_Instructions 

- Clone the repository:

Copy code

```bash
git clone https://github.com/kate-sarant/Appointy.git
cd Appointy
```


- Install dependencies:

Copy code
```bash
npm install
composer install
```

- Update the `.env`file with your database credentials:

Copy code

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 
DB_PORT=3306
DB_DATABASE=appointy 
DB_USERNAME= your_username 
DB_PASSWORD= your_password
Run database migrations:
```

Copy code

```bash
php artisan migrate
Seed the database with dummy data:
```

Copy code

```bash
php artisan make:factory EventFactory -m 'App\Models\Event'
php artisan db:seed --class=AppointmentSeeder
```


- Mail (Update the mail credentials in the `.env` file )

Copy code

```bash
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=

```
 ☕️ 👍️ For testing  I utilized mailtrap.io 

- Compile assets:

```bash
Copy code
npm run dev
```

- Start the local development server:

```bash
Copy code
php artisan serve
```

- Access the application in your browser.



# Troubleshooting
If facing issues, check the Laravel documentation or GitHub repository for solutions.
Make sure all prerequisites are installed and properly configured.




### Links

- GitHub: [Add live site URL here](https://github.com/kate-sarant/Appointy.git)



### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL database


## Author

- Linkedin - linkedin.com/in/aikaterini-sarantopoulou-4b05a51b5
- GitHub - [kate-sarant] https://github.com/kate-sarant
