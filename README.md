Langkah-Langkah Setelah Clone Proyek Laravel + Filament
Misalnya kamu clone dari GitHub:

git clone https://github.com/username/project-laravel-filament.git
cd project-laravel-filament
Setelah itu, ikuti urutan berikut:

1. Install dependency PHP dengan Composer
composer install
Bukan composer update ya (itu biasanya buat upgrade versi package). Cukup install saja agar sesuai dengan versi yang ditentukan di composer.lock.

2. Copy file .env
Kalau file .env belum ada, copy dari contoh:

cp .env.example .env
Lalu edit .env sesuai kebutuhan, terutama bagian ini:

APP_NAME="My Project"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=namadb
DB_USERNAME=root
DB_PASSWORD=
3. Generate APP_KEY
php artisan key:generate
4. Jalankan Migrasi (dan seeding jika ada)
Jika tabel-tabel belum ada di database:

php artisan migrate
