<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Setup Instructions

This project is built using the Laravel framework with Sail as the development environment.

### Requirements
- Docker
- Laravel Sail

### Installation Steps

#### 1. Clone the Repository
```bash
git clone https://your-repo-url.git
cd your-repo-folder
```

#### 2. Install Dependencies
```bash
composer install
```

#### 3. Copy Environment File
```bash
cp .env.example .env
```

#### 4. Generate Application Key
```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
```

#### 5. Run Migrations
```bash
./vendor/bin/sail artisan migrate
```

#### 6. Install Laravel Passport
```bash
./vendor/bin/sail artisan passport:install
```

#### 7. Seed the Database
```bash
./vendor/bin/sail artisan db:seed
```

### Notes
- Make sure Docker is running before executing Sail commands.
- Use `.env` to configure your database, mail, and other environment-specific settings.

### Helpful Sail Commands
Start the server:
```bash
./vendor/bin/sail up -d
```

Stop the server:
```bash
./vendor/bin/sail down
```

Execute Artisan command:
```bash
./vendor/bin/sail artisan <command>
```

## License

This project is open-source and licensed under the [MIT license](https://opensource.org/licenses/MIT).

