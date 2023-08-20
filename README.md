<a name="readme-top"></a>
<br />
<div align="center">
  <a href="#">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">SPK Jenis Pupuk</h3>

  <p align="center">
    Sistem Pendukung Keputusan Untuk Menentukan Jenis Pupuk Buatan Pada Tanaman Padi
  </p>
</div>

## Topik Proyek

Studi Sistem Pendukung Keputusan Untuk Menentukan Jenis Pupuk Buatan Pada Tanaman Padi Menggunakan Metode Complex Proportional Assessment (COPRAS)

### Jenis Sistem / Aplikasi

Aplikasi Website.

## Spesifikasi Minimal

Berikut spesifikasi minimal yang dibutuhkan perangkat untuk instalasi aplikasi:
* OS : Windows 10
* Memori : 8 GB
* Prosesor : Intel Core i5

### Requirements

Berikut beberapa tools yang harus sudah di-install sebelumnya pada perangkat untuk instalasi aplikasi:
* Git
* XAMPP
* Node.js
* Composer

### Instalasi

Berikut beberapa tools yang harus sudah di-install sebelumnya pada perangkat untuk instalasi aplikasi:

1. Jalankan XAMPP dengan mengklik tombol "Start" pada module "Apache" dan "MySQL"
2. Buka CMD di direktori yang anda inginkan
3. Ketikkan command berikut pada CMD
   ```sh
   git clone https://github.com/gahasapurba/SPK-Jenis-Pupuk.git
   ```
4. Buka CMD di direktori proyek
5. Ketikkan command berikut pada CMD
   ```sh
   composer install
   ```
6. Ketikkan command berikut pada CMD
   ```sh
   composer update
   ```
7. Ketikkan command berikut pada CMD
   ```sh
   copy .env.example .env
   ```
8. Buat database dengan nama "spkjenispupuk"
9. Ketikkan command berikut pada CMD
   ```sh
   php artisan optimize:clear
   ```
10. Ketikkan command berikut pada CMD
   ```sh
   php artisan key:generate
   ```
11. Ketikkan command berikut pada CMD
   ```sh
   php artisan migrate --seed
   ```
12. Ketikkan command berikut pada CMD
   ```sh
   php artisan storage:link
   ```
13. Ketikkan command berikut pada CMD
   ```sh
   php artisan serve
   ```

## Daftar User Type

1. Role Administrator
   Email : gahasapurba.tech@gmail.com
   Kata Sandi : spkjenispupuk123456

2. Role User
   Email : gahasapurba.social@gmail.com
   Kata Sandi : gahasa123456
