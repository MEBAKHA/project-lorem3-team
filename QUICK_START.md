# 🚀 Quick Start - Admin User Application

## ⚡ Setup Cepat (5 Menit)

### Step 1: Setup Database
Buka file `.env` dan ubah konfigurasi database:
```
DB_CONNECTION=mysql
DB_DATABASE=techfest
DB_USERNAME=root
DB_PASSWORD=
```

### Step 2: Jalankan Migration & Seed
```bash
php artisan migrate --seed
```

### Step 3: Jalankan Server
```bash
php artisan serve
```

### Step 4: Akses Aplikasi
Buka browser: `http://localhost:8000`

---

## 🔑 Login dengan Akun Default

### Admin Account
```
Email: admin@example.com
Password: password123
```

**Fitur Admin:**
- 📊 Dashboard dengan statistik
- 👥 Kelola semua user
- ✏️ Edit & hapus user
- 📈 Lihat activity user

### Regular User Account
```
Email: test@example.com
Password: password123
```

**Fitur User:**
- 🏠 Dashboard pribadi
- 👤 Edit profil sendiri
- 🔒 Manage account

---

## 📁 File Penting

| File | Fungsi |
|------|--------|
| `routes/web.php` | Semua routes aplikasi |
| `app/Http/Controllers/AdminController.php` | Logic admin |
| `app/Http/Controllers/UserController.php` | Logic user |
| `resources/views/layouts/app.blade.php` | Layout utama |
| `app/Models/User.php` | User model dengan role |

---

## 🎯 Fitur Utama

### Admin Dashboard
✅ Statistik total user  
✅ List user terbaru  
✅ Quick action links  
✅ User activity monitor  

### User Management
✅ Lihat daftar semua user  
✅ View detail user  
✅ Edit informasi user  
✅ Hapus user  

### User Profile
✅ Edit nama & email  
✅ Security settings  
✅ Account status  
✅ Member info  

---

## 🎨 UI/UX Features

- ✨ Modern design dengan Tailwind CSS CDN
- 📱 Fully responsive (mobile-friendly)
- 🎭 Dark mode compatible
- ⚡ Smooth animations & transitions
- 🎪 Interactive elements dengan Alpine.js
- 🎨 Beautiful gradients & cards

---

## 🔧 Customization Tips

### Change Colors
Edit `resources/views/layouts/app.blade.php`:
```blade
<!-- Blue → Change to other colors -->
bg-blue-600 → bg-purple-600
text-blue-600 → text-green-600
```

### Change Sidebar Logo
```blade
<h1 class="text-2xl font-bold flex items-center gap-2">
    <i class="fas fa-chart-line"></i> Admin Panel
</h1>
```

### Add More Routes
Di `routes/web.php`:
```php
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
```

---

## ✅ Checklist

- [ ] Database configured
- [ ] `php artisan migrate --seed` berhasil
- [ ] `php artisan serve` running
- [ ] Bisa login dengan admin account
- [ ] Admin dashboard menampilkan data
- [ ] Bisa view & edit user
- [ ] User bisa login & edit profil

---

## 📞 Support

Jika ada error:

1. **Clear cache:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   ```

2. **Check logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

3. **Regenerate key:**
   ```bash
   php artisan key:generate
   ```

---

Selamat mencoba! 🎉
