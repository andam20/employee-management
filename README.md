<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


additional info for the documentation:
for Create a custom command to export database : php artisan export:alldb:csv
that will save the file in the storage/app/backup/backup_

and 
for Create a custom command to remove log files: php artisan logs:clear
and 
for Create a custom command to export all employees to a json file: php artisan employees:export
that will save the file in the storage/app/exports/employees_

and 
for  Create a custom command to insert 1000 rows of fake data into employees table: php artisan employees:fake

and 
for Logs older than 1 month in database should be deleted automatically: php artisan make:command DeleteOldLogs

and also for Listing steps to deploy the System with Nginx and adding TLS : 
1-Install Nginx, PHP, MySQL, and other required packages on your server:
sudo apt-get update
sudo apt-get install nginx php-fpm php-mysql php-mbstring php-xml mysql-server

2-Create a new MySQL database and user for your Laravel project:mysql -u root -p
CREATE DATABASE <database-name>;
CREATE USER '<employee-management>'@'localhost' IDENTIFIED BY '<123456>';
GRANT ALL PRIVILEGES ON <database-name>.* TO '<employee-management>'@'localhost';
FLUSH PRIVILEGES;
EXIT;


3-Clone your Laravel project from a Git repository:
git clone <https://github.com/andam20/employee-management> <project-directory>


4-Install the project dependencies using Composer:
cd <project-management>
composer install

5-Copy the .env.example file to .env and update the database configuration with your MySQL database details:
cp .env.example .env
nano .env

6-Update the following lines with appropriate values:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<employee-management>
DB_USERNAME=<employee-management>
DB_PASSWORD=<123456>

7-Generate a new application key:
php artisan key:generate

8-Migrate the database schema:
php artisan migrate

9-Create a new Nginx server block for your Laravel project:
sudo nano /etc/nginx/sites-available/<employee-management>

10-Add the following configuration to the file:
server {
    listen 80;
    server_name employee.managemenet.com;
    root /var/www/<project-directory>/public;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}

11-Create a symbolic link for the Nginx server block:
sudo ln -s /etc/nginx/sites-available/<employee-management> /etc/nginx/sites-enabled/

12-Test the Nginx configuration and restart the Nginx service:
sudo nginx -t
sudo systemctl restart nginx






and also for cloning a laravel project from the github you can do this steps:
1-First, you need to have Git installed on your local machine
2-Next, go to the GitHub repository page where the Laravel project is hosted and copy the URL of the repository.
3-Open your terminal or command prompt and navigate to the directory where you want to clone the project.
4-After the cloning process is complete, navigate into the cloned project directory using the cd command. For example, if the project directory is named "laravel-project", you can navigate to it by running:

git clone "the link of the project"
cd laravel-project
 
5-Once inside the project directory, run the composer install command to install all the required dependencies.
6-After the installation process is complete, you can configure the .env file and run the necessary database migrations to get the project up and running.





