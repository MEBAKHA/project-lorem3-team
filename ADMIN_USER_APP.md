# Admin-User Application dengan Tailwind CSS

Aplikasi modern admin-user panel yang dibangun dengan Laravel dan styled menggunakan Tailwind CSS CDN.

## 🚀 Fitur Utama

### Admin Dashboard
- 📊 Dashboard dengan statistik real-time
- 👥 Manajemen user lengkap (CRUD)
- 📈 Tampilan daftar user dengan pagination
- 🎨 Design modern dengan Tailwind CSS

### User Dashboard
- 🏠 Home page dengan overview profil
- 👤 Management profil pribadi
- 🔒 Keamanan akun
- ⚡ Quick actions

### Design & UI
- Responsive design (mobile, tablet, desktop)
- Modern gradient backgrounds
- Smooth transitions dan animations
- Dark mode compatible
- Interactive sidebar navigation

## 📋 Prasyarat

- PHP 8.2+
- MySQL/MariaDB
- Laravel 11.x
- Composer

## ⚙️ Installation & Setup

### 1. Clone atau Extract Project
```bash
cd techfest
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database
Edit file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techfest
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations & Seed
```bash
php artisan migrate --seed
```

### 6. Start Development Server
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 👤 Default Users untuk Testing

### Admin Account
- **Email**: admin@example.com
- **Password**: password123
- **Role**: Admin

### Test User Account
- **Email**: test@example.com
- **Password**: password123
- **Role**: User

Dan 8 user tambahan yang dibuat secara otomatis.

## 📱 Routes

### Public Routes
- `/` - Welcome page
- `/login` - Login page
- `/register` - Register page

### User Routes (Authenticated)
- `/dashboard` - User dashboard
- `/profile` - User profile
- `PUT /profile` - Update profile

### Admin Routes (Admin Only)
- `/admin/dashboard` - Admin dashboard
- `/admin/users` - List all users
- `/admin/users/{id}` - View user detail
- `/admin/users/{id}/edit` - Edit user
- `PUT /admin/users/{id}` - Update user
- `DELETE /admin/users/{id}` - Delete user

## 🗂️ Project Structure

```
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php          # Main layout dengan sidebar
│   ├── admin/
│   │   ├── dashboard.blade.php    # Admin dashboard
│   │   └── users/
│   │       ├── index.blade.php    # User list
│   │       ├── show.blade.php     # User detail
│   │       └── edit.blade.php     # Edit user
│   └── user/
│       ├── dashboard.blade.php    # User dashboard
│       └── profile.blade.php      # User profile
│
app/
├── Http/
│   ├── Controllers/
│   │   ├── AdminController.php    # Admin logic
│   │   └── UserController.php     # User logic
│   └── Middleware/
│       └── AdminMiddleware.php    # Admin auth check
│
└── Models/
    └── User.php                   # User model dengan role
```

## 🎨 Styling dengan Tailwind CSS

Aplikasi menggunakan Tailwind CSS CDN untuk styling modern:

```html
<script src="https://cdn.tailwindcss.com"></script>
```

### Colors & Theme
- **Primary**: Blue (blue-600)
- **Success**: Green (green-600)
- **Warning**: Yellow (yellow-600)
- **Danger**: Red (red-600)
- **Background**: Light gray (gray-50)

### Components
- Responsive sidebar navigation
- Modern cards dengan shadow & hover effects
- Form inputs dengan validation styling
- Pagination controls
- Alert messages (success, error)

## 🔐 Security Features

1. **Authentication**
   - Built-in Laravel authentication
   - Password hashing with bcrypt

2. **Authorization**
   - Admin middleware untuk route protection
   - Role-based access control (Admin/User)

3. **Validation**
   - Server-side form validation
   - Email uniqueness checking
   - CSRF protection

## 📝 Form Handling

### Login
```blade
{{ route('login') }}  # POST to authenticate
```

### User Update
```blade
{{ route('user.profile.update') }}  # PUT request
```

### Admin User Edit
```blade
{{ route('admin.users.update', $user) }}  # PUT request
```

## 🚀 Production Deployment

### Optimization
1. Cache configuration:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. Compile Tailwind CSS (optional):
   ```bash
   npm install -D tailwindcss
   npx tailwindcss build resources/css/app.css -o public/css/app.css
   ```

3. Set production environment:
   ```
   APP_ENV=production
   APP_DEBUG=false
   ```

## 🆘 Troubleshooting

### Database Connection Error
- Cek konfigurasi `.env`
- Pastikan MySQL sudah running
- Jalankan `php artisan migrate`

### Route Not Found
- Jalankan `php artisan route:clear`
- Pastikan AuthServiceProvider terdaftar

### Middleware Error
- Cek bootstrap/app.php untuk middleware alias
- Pastikan AdminMiddleware terdaftar

## 📚 Learn More

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)

## 📄 License

MIT License

---

**Dibuat untuk TechFest Competition**
