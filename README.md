CARA INSTALASI 

pertama-tama clone repository nya di terminal

git clone https://github.com/alifanLeywin/tugasManagement.git

di htdocs xampp/mamp

dan cd masuk ke project lalu code . untuk masuk ke vs code 

lalu tambahkan terminal 

lalu composer install 
     composer update
     cp .env.example .env
     ubah di .env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306 
     DB_DATABASE=namadb
     DB_USERNAME=root
     DB_PASSWORD= (kosong kan, jika menggunakan password tambahkan saja)

lalu diterminal ketik php artisan key:generate
                      php artisan migrate


jika ada error tentang utf8mb4_unicode_ci ketika di migarte 
tambahkan DB_COLLATION=utf8mb4_unicode_ci di .env di bawah DB_PASSWORD

lalu php artisan migrate di terminal 

lalu php artisan serve 









