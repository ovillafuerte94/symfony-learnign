# Symfony Learning

A simple learning project based on Symfony 6.x

## Requirements

- [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download)

## Clone repository and install packages

```bash
git clone https://github.com/ovillafuerte94/symfony-learnign.git
cd symfony-learnign
composer install
npm install
npm run dev
```

## Configure database
Edit the .env file in the root of the project and set the environment variables for your database connection:
```
DATABASE_URL=mysql://user:password@localhost/database
```
Replace *user*, *password* and *database* with your database details.

## Create Database
```
php bin/console doctrine:database:create
```

## Execute Migrations
```
php bin/console doctrine:migrations:migrate
```

## Populate your database
```
php bin/console doctrine:fixtures:load
```

## Open in browser
Through the terminal in the project folder, execute the command
```
symfony serve
```
Open from browser at http://localhost:8000

Access to dashboard at http://localhost:8000/admin