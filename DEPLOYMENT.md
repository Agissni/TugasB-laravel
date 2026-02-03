# La Dolce Raya - Toko Kue Online

Aplikasi Laravel untuk mengelola pesanan kue online.

## Deployment di Railway

### Persiapan:
1. Push repository ke GitHub
2. Buka [Railway.app](https://railway.app)
3. Klik "New Project" → "Deploy from GitHub repo"
4. Pilih repository `TugasB-laravel`

### Setup Database di Railway:
1. Di Railway Dashboard, klik "New" → "Database" → "MySQL"
2. Tunggu MySQL selesai dibuat
3. Klik variabel environment MySQL untuk melihat credentials
4. Environment variables akan otomatis terbaca sebagai `DATABASE_URL_*`

### Environment Variables di Railway:
Tambahkan di Railway Dashboard → Variables:
```
APP_KEY=base64:AXKMFOG4Jl74Noal92lhZ/6PxZeZ3JyUDQWWw635ze4=
APP_ENV=production
APP_DEBUG=false
ADMIN_PASSWORD=admin123
```

### Deploy:
1. Setelah semua environment variables diset, Railway akan otomatis deploy
2. Migration dan seeding akan berjalan otomatis via `Procfile`
3. Tunggu hingga status "Running" (biasanya 3-5 menit)

## Setup Lokal

### Requirements:
- PHP 8.2+
- MySQL 8.0+
- Composer
- Node.js 18+
- XAMPP (recommended untuk development)

### Instalasi:
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate APP_KEY
php artisan key:generate

# Jalankan migration database
php artisan migrate

# Seed data kue
php artisan db:seed --class=TokokueSeeder

# Build assets
npm run build

# Jalankan development server
php artisan serve
```

### Akses:
- **Website**: http://localhost:8000
- **Dashboard Admin**: http://localhost:8000/dashboard
- **Password Admin**: admin123

## Features

✅ Listing produk kue
✅ Form pemesanan kue
✅ Dashboard admin untuk melihat pesanan
✅ Edit dan hapus pesanan
✅ Session-based login untuk admin

## Troubleshooting

### Error: "View [pesanan.Pesan] not found"
- Pastikan nama file view cocok dengan nama yang dipanggil di controller
- File harus: `resources/views/pesanan/Pesan.blade.php` (dengan P besar)

### Error: Database connection refused di Railway
- Pastikan MySQL database sudah dibuat di Railway
- Cek bahwa environment variables `DATABASE_URL_*` sudah ter-set
- Lihat Railway logs untuk error lebih detail

### Data kue tidak muncul di dropdown
- Pastikan sudah menjalankan seeder: `php artisan db:seed --class=TokokueSeeder`
- Cek tabel `tokokue` memiliki data: `SELECT * FROM tokokue;`
