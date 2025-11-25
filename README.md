# 🍪 Cookie Shop - Laravel E-Commerce

A modern e-commerce application for a cookie shop built with Laravel 12.

## 🚀 Quick Start

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start server
php artisan serve
```

Visit `http://localhost:8000`

## ✨ Features

- Product catalog (cookies, brownies, cakes)
- Shopping cart functionality
- User authentication with admin support
- Product details with ingredients

## 🛠️ Tech Stack

- Laravel 12
- PHP 8.2+
- SQLite
- Blade Templates

## 📁 Project Structure

- `app/Models/` - User & Product models
- `app/Http/Controllers/` - Application controllers
- `database/migrations/` - Database schema
- `resources/views/` - Blade templates

## 🗄️ Database

- **Users**: Authentication with admin roles
- **Products**: Name, type, price, ingredients (JSON)

## 📝 Commands

```bash
php artisan migrate          # Run migrations
php artisan migrate:fresh    # Reset database
php artisan db:seed          # Seed data
php artisan route:list       # List routes
```

---

Made with ❤️ using Laravel
