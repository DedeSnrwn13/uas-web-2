## Cara Instalasi Di Local
1.	Clone projek ini: https://github.com/DedeSnrwn13/uas-web-2
2.	Install PHP minimal versi 8.3
3.	Install Composer
4.	Install Laragon/Xampp
5.	Pastikan Apache & mysql nya sudah berjala jik pakai Xampp/Laragon
6.	Copy paster file `.env.example` dan rename menjadi `.env`
7.	Jalankan `composer install`
8.	Jalankan `npm install` dan kemudia `npm run dev`
9.	Buat database mysql baru misal dengan nama `uas_web_2`, maka konfigurasi seperti di bawah di file `.env`
 
 ![image](https://github.com/user-attachments/assets/26ff0cf9-d117-434d-96cb-5700adcb37c6)

10. Jalankan `php artisan key:generate`
11.	Jalankan `php artisan migrate:fresh --seed`
12.	Jalankan `php artisan serve`
13.	Buka `http://127.0.0.1:8000/` untuk melihat homepage
15.	Kemudian akses login dari url `http://127.0.0.1:8000/admin/login`
16.	Jika belum ada admin, maka bisa membuat user baru dengan menjalankan perintah `php artisan make:filament-user`
