# Kudoboard 2021

## FUNCTIONS

* Login
* Logout
* Register users
* Create a KudoBoard for a worker.
* Post in a KudoBoard

## CLONE THE REPOSITORY

Create a folder in your Desktop Open Command Prompt

~~~
: mkdir projects
: cd project
: git clone https://github.com/itsasy/laravel-kudo.git
: cd KudoBoard
: composer install
: npm install
~~~

## GENERATE KEYS

In your command prompt

~~~
: cp .env.example .env
: php artisan key:generate
: php artisan jwt:secret
: php artisan migrate:refresh --seed
: php artisan serve
: npm run serve
~~~

## RUN PROYECT

Open the link generated in the browser and enter with these credentials

~~~
Like ADMIN
user: admin@gmail.com
password: password

Like JOCA
user: joca@gmail.com
password: password
~~~

## RUN TEST
see all in green. In your command prompt run..

~~~
: php artisan test
~~~
