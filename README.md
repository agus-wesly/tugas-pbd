## Tech Stack

-   Laravel
-   Inertia.js
-   Vue.js
-   Tailwind.css
-   Shadcn-ui (Radix vue + Tailwind)

## Prerequisites

-   PHP v.8.1.2 or above
-   Composer v.2.5.8 or above
-   Node.js v.18.17.1 or above
-   NPM v.9.6.7 or above
-   MySQL

## Get started

#### Clone Repo

```
git clone git@github.com:agus-wesly/uts-laravel-ecommerce-app.git laravel-my-ecommerce
```

```
cd laravel-my-ecommerce
```

#### Install dependencies

```
composer install
```

```
npm install
```

#### Copy env.example and rename it to .env

```
cp -i .env.example .env
```

#### Now fill this db configuration in .env file

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

```

#### Generate a new application key

```
php artisan key:generate
```

#### Run the database migrations **(Remember to set the database connection in .env before migrating)**

```
php artisan migrate
```

### Run the seeder

```
php artisan db:seed
```

#### Run the app

```
php artisan serve
```

```
// Open this in another terminal
npm run dev
```

### Open this link in your browsser

```
http://127.0.0.1:8000
```
