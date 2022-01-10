# laravel-passport-test
#### Laravel Passport provides a full OAuth2 server implementation for this application in a matter of minutes. Passport is built on top of the League OAuth2 server that is maintained by Andy Millington and Simon Hamp.
### Project setup

#### clone the project from repository using the `git clone https://github.com/sprintcorp/laravel-passprt-test.git` into a directory on your pc then move project directory with this command `cd laravel-passprt-test` afterwards run `composer install` to install all packages needed for the application to function which is installed from the composer.json file which creates a vendor file housing all needed application-level package manager for the application.
#### When the above has been done you the proceed to create database, the database use during development is mysql database and Eloquent ORM is used to interact with the database, after this is done a sample of the `.env` exist as `.env.example` which can be copied to create enviroment variable for this application which houses simple configuration text file that is used to define some variables passed into the application's environment, after this is done an app key is needed for the application to function properly used for all encrypted data, like sessions,Password, remember token using `php artisan key:generate`.
#### Next run `php artisan migrate`, runs migration which creates table in the database specified application `.env` file, than run `php artisan passport:install` which then create the encryption keys needed to generate secure access tokens.
#### After all the above has been done the project can be serverd or run using `php artisan serve` which starts the application using laravel default pot `8000` to run it on the system locally.
### Endpoints
#### create user http://127.0.0.1:8000/api/register expected data are name,email,phone and password
#### login user http://127.0.0.1:8000/api/login expected data are email/phone and password
#### get logged in user http://127.0.0.1:8000/api/user
