# 🛵 Rental System (Motor/Alat)

Sistem Rental sederhana berbasis web yang dibangun dengan **Laravel 12** dan **Filament v3**. Aplikasi ini dirancang untuk mengelola penyewaan barang (seperti motor atau alat teknik) dengan logic ketersediaan stok yang otomatis.

## 🚀 Fitur & Alur

### Fitur Admin (Dashboard)

- **Manajemen Barang (Items)**: CRUD data barang, stok, harga sewa, dan upload gambar.
- **Manajemen Booking**: Approval pesanan user. Admin hanya bisa mengubah status booking (kunci input lain saat edit).
- **Mutasi Stok Otomatis**:
    - Status `Approved` -> Stok Barang berkurang.
    - Status `Done`/`Cancelled` -> Stok Barang bertambah kembali.
- **Dashboard Stats**: Pantau jumlah booking pending, booking aktif, dan total pendapatan secara real-time.

### Fitur User (Frontend)

- **Browse Items**: Melihat daftar barang yang tersedia dengan tampilan card modern.
- **Booking Detail**: Halaman detail barang dengan kalkulasi harga otomatis berdasarkan rentang tanggal.
- **Availability Check**: Validasi stok otomatis sebelum booking berhasil dikirim.

### Alur Kerja (Workflow)

1. **User** memilih barang -> pilih tanggal -> klik **Booking**.
2. Sistem cek stok di rentang tanggal tersebut. Jika aman, status booking masuk sebagai `pending`.
3. **Admin** masuk ke dashboard -> Cek data booking -> Ubah status jadi `Approved`.
4. Saat di-approve, stok fisik barang otomatis berkurang.
5. Setelah sewa selesai, **Admin** ubah status jadi `Done`. Stok otomatis kembali bertambah.

---

## 🛠️ Tools & Tech Stack

- **Framework**: [Laravel 12](https://laravel.com)
- **Admin Panel**: [Filament v3](https://filamentphp.com) (Sat-set buat bikin CRUD & Dashboard)
- **Frontend**: [Livewire v3](https://livewire.laravel.com) (Interaktif tanpa refresh halaman)
- **Styling**: [Tailwind CSS](https://tailwindcss.com) (CDN for Dev mode)
- **Database**: MySQL / MariaDB
- **User Management**: [Filament Shield](https://github.com/bezhanSalleh/filament-shield) (Role & Permissions)

---

## ⚙️ Setup & Installation

Ikuti langkah ini buat jalanin project di lokal lu:

### 1. Persiapan

Clone project ini (atau pastiin lu udah di folder project) dan install dependencies:

```bash
composer install
npm install
```

### 2. Database Configuration

Buat database baru (misal: `rental`) dan sesuaikan file `.env` lu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrasi & Seeding

Jalanin migrasi buat bikin tabel dan seeder buat bikin akun admin default:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

_Note: Akun admin default adalah `admin@admin.com` dengan password `password`._

### 4. Menjalankan Aplikasi

Buka dua terminal dan jalanin command ini:

```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite (Asset Bundler)
npm run dev
```

Akses aplikasi di: [http://localhost:8000](http://localhost:8000)
Akses Admin Panel di: [http://localhost:8000/admin](http://localhost:8000/admin)

---

_Hidup ini berat, sewa aja dulu._

---

© 2026 Copyright dev by **Vrdeyy**
