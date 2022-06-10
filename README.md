# BlueBees4U 

BlueBees4U website and web application was developed for BlueBees4U by BlueBees AI.

## Installation

Install Composer.
```bash
composer install
```

Copy ```.env.example``` file to ```.env``` file.
```bash
cp .env.example .env
```

Generate key in ```.env``` file.
```bash
php artisan key:generate
```

Link ```storage``` folder.
```bash
php artisan storage:link
```

Run migrations.
```bash
php artisan migrate
```

Run seeders.
```bash
php artisan db:seed
```

Install ```npm```.
```bash
npm install
```

Run ```watch``` in development environment.
```bash
npm run watch
```
