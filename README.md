# 🧪 Inventaris Lab

**Inventaris Lab** adalah web aplikasi modern berbasis Laravel yang dirancang khusus untuk manajemen aset dan peminjaman barang di laboratorium sekolah atau instansi secara efisien, transparan, dan real-time.

---

## ✨ Fitur Utama

### 👨‍💼 Panel Administrator
- **Dashboard Monitoring**: Pantau stok barang, jumlah siswa, dan permintaan peminjaman yang perlu disetujui dalam satu tampilan.
- **Manajemen Barang (CRUD)**: Kelola data aset lengkap dengan sistem kategori dan merek.
- **Sistem Crop Foto**: Unggah foto aset dengan fitur pemotongan (cropping) yang presisi untuk hasil yang rapi.
- **Verifikasi Peminjaman**: Setujui atau tolak permintaan peminjaman dari siswa dengan sistem status yang jelas.
- **Sistem Notifikasi**: Umpan balik visual yang dinamis (Hijau/Kuning/Orange/Merah) untuk setiap aksi.

### 🎓 Panel Siswa
- **Eksplorasi Barang**: Cari dan lihat ketersediaan barang laboratorium dengan tampilan kartu yang modern.
- **Booking & Pinjam**: Ajukan peminjaman barang secara mandiri.
- **Riwayat Peminjaman**: Pantau status barang yang sedang dipinjam atau sudah dikembalikan.
- **Manajemen Profil**: Perbarui informasi profil dan kata sandi dengan fitur keamanan *password visibility*.

---

## 🚀 Teknologi Utama

- **Framework**: [Laravel 11](https://laravel.com)
- **Styling**: [Tailwind CSS](https://tailwindcss.com) (Vanilla & Glassmorphism)
- **Frontend Interactivity**: [Alpine.js](https://alpinejs.dev)
- **Database**: MySQL
- **Tooling**: 
  - [Vite](https://vitejs.dev) untuk aset bundling.
  - [Cropper.js](https://fengyuanchen.github.io/cropperjs/) untuk pengolahan gambar.

---

## 🛠️ Instalasi

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username/sistem_inventaris.git
    cd sistem_inventaris
    ```

2.  **Instal Dependensi**
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Lingkungan**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Migrasi Database**
    ```bash
    php artisan migrate --seed
    ```

5.  **Jalankan Aplikasi**
    ```bash
    npm run dev
    php artisan serve
    ```

---

## 🎨 UI/UX Highlights
- **Premium Aesthetics**: Menggunakan palet warna yang harmonis, efek *blur glassmorphism*, dan animasi transisi halus.
- **Interaktif**: Notifikasi yang bisa di-*dismiss*, tombol intip *password*, dan preview foto yang profesional.
- **Responsif**: Dapat diakses dengan nyaman melalui perangkat mobile maupun desktop.

---
© {{ date('Y') }} Inventaris Lab - Sistem Manajemen Efisien.

