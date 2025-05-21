# Laravel API for User & Task Management

## 🔧 Setup Instructions

1. Clone the repo
2. Install dependencies:
   ```bash
   composer install

3.Configure .env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=secret

4.Generate key & migrate:
php artisan key:generate
php artisan migrate --seed

5.Serve the app:
php artisan serve

6.Seeding the database
php artisan db:seed

