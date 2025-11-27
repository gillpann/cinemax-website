# 🎬 CINEMAX – Website Streaming Film (PHP + MySQL)

Cinemax adalah website streaming sederhana yang memungkinkan pengguna menonton film, melihat trailer, mencari film berdasarkan kategori, dan membaca detail film.  
Website ini juga memiliki **Admin Panel** untuk mengelola daftar film seperti menambahkan film baru, mengedit data, menghapus film, serta mengunggah poster.

---

## Cara Clone & Menjalankan Project

### Clone Repository
```bash
git clone https://github.com/USERNAME/cinemax.git
```

### Masuk ke folder project:
```
cd cinemax
```

---

## Pindahkan ke XAMPP
### Letakkan folder project ini di:
```
C:/xampp/htdocs/cinemax
```

---

## Import Database
### Buka phpMyAdmin

Buat database baru, misalnya: cinemax_db

Klik tab Import

Pilih file: cinemax_db.sql

Klik Go

---

## Atur Koneksi Database

Sesuaikan konfigurasi database pada file (misalnya config/database.php):
```
$conn = mysqli_connect("localhost", "root", "", "cinemax_db");
```

--- 

## Jalankan Website

### Buka browser:

http://localhost/cinemax

### Admin panel biasanya dapat diakses melalui:

http://localhost/cinemax/admin
