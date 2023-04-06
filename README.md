<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Build instructions

1. Make sure `composer` and `php` are installed and included in `PATH`.

2. Copy the `.env.example` to `.env` and change the database configuration as per your system.

```bash
cp ./env.example ./env
```

3. Make sure the database server is running and accessible.

```bash
# Using psql to check if there is a movies_app database running
psql movies_app
```

4. Use `artisan` to migrate and seed the database

Unix
```bash
chmod +x ./artisan
./artisan migrate --seed
```

Windows
```cmd
php .\artisan migrate --seed
```
