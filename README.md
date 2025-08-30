# 🧪 Oxylabs Product Crawler - Technical Test

> **Full Stack Laravel Developer Technical Test** - A comprehensive web application demonstrating advanced Laravel development skills.

## 🎯 Project Overview

This project implements a complete product data management system with web scraping, asynchronous processing, admin panel, and dynamic frontend. Built for a technical test to evaluate skills in PHP (Laravel, Filament), MySQL, JavaScript (AlpineJS, Livewire), HTML, and CSS (TailwindCSS).

## 🌐 Data Source

- **URL**: `https://sandbox.oxylabs.io/products`
- **Data Extracted**: title, price, image_url, description, category, url, extracted_at

## 🚀 Live Demo

**🌍 Production URL**: [https://oxylabs-product-crawler-ncod.vercel.app](https://oxylabs-product-crawler-ncod.vercel.app)

## 📁 Project Structure

```
oxylabs-product-crawler/
├── crawler-php/                 # PHP Web Scraper
│   ├── src/
│   │   └── Crawler.php         # Main crawler class
│   ├── composer.json            # PHP dependencies
│   └── crawler.php             # Execution script
├── laravel/                     # Laravel Application
│   ├── app/
│   │   ├── Models/             # Eloquent models
│   │   ├── Jobs/               # Queue jobs
│   │   ├── Http/Controllers/   # API controllers
│   │   └── Filament/           # Admin panel resources
│   ├── database/
│   │   └── migrations/         # Database schema
│   ├── resources/views/        # Blade templates
│   └── routes/                 # Application routes
├── vercel.json                  # Vercel deployment config
└── README.md                    # Project documentation
```

## ✅ Features Implemented

- **Web Scraping**: PHP crawler using Guzzle HTTP + Symfony DomCrawler
- **Laravel Backend**: Product and Image models with Eloquent relationships
- **Asynchronous Processing**: Queue system with background jobs
- **Admin Panel**: Professional Filament interface with full CRUD operations
- **Dynamic Frontend**: Livewire + AlpineJS with responsive design
- **Theme System**: Dark/Light mode toggle with purple accent colors
- **Search & Filtering**: Advanced product discovery capabilities
- **Image Management**: Product image handling with relationships
- **API Endpoints**: RESTful API for data import and management
- **Responsive Design**: Mobile-first approach with TailwindCSS

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM (for frontend assets)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Mightyshambel/oxylabs-product-crawler.git
   cd oxylabs-product-crawler
   ```

2. **Setup PHP Crawler**
   ```bash
   cd crawler-php
   composer install
   php src/crawler.php
   ```

3. **Setup Laravel Backend**
   ```bash
   cd laravel
   composer install
   php artisan key:generate
   php artisan migrate
   php artisan serve
   ```

4. **Access Admin Panel**
   - URL: `http://127.0.0.1:8000/admin`
   - Email: `admin@example.com`
   - Password: `password`

## 🧪 Testing

### Crawler Test
```bash
cd crawler-php
php src/crawler.php
# Output: products.json with extracted data
```

### Backend Test
```bash
cd laravel
php artisan tinker
# Test models, jobs, and relationships
```

### Admin Panel Test
- Navigate to `/admin`
- Login with admin credentials
- Create, edit, delete products
- Manage product images

### Frontend Test
- Visit the homepage `/`
- Test dark/light mode toggle
- Test search and filtering
- Test pagination and sorting

## 📊 Technical Stack

| Component | Technology | Version |
|-----------|------------|---------|
| **Backend** | Laravel | 11.45.2 |
| **Admin Panel** | Filament | 3.3.37 |
| **Frontend** | Livewire + AlpineJS | Latest |
| **Styling** | TailwindCSS | Latest |
| **Database** | SQLite | Latest |
| **Queue System** | Laravel Queues | Built-in |
| **HTTP Client** | Guzzle | 7.0+ |
| **Web Scraping** | Symfony DomCrawler | 7.0+ |
| **Deployment** | Vercel | Serverless |

## 🔧 Key Features

- **Asynchronous Processing**: Queue-based import system
- **Real-time Updates**: Livewire components for dynamic UI
- **Responsive Design**: Mobile-first approach with TailwindCSS
- **Admin Management**: Professional Filament admin interface
- **Data Validation**: Comprehensive input validation and error handling
- **Image Management**: Product image handling with relationships
- **Search & Filter**: Advanced product discovery features
- **Theme System**: Dark/Light mode with purple accent colors
- **Custom Footer**: Branded footer across all pages

## 📝 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/import` | Import products from JSON data |
| `GET` | `/admin` | Admin panel access |
| `GET` | `/` | Public products page (homepage) |

## 🎨 UI/UX Features

- **Dark Theme**: Modern, professional appearance
- **Responsive Grid**: Adapts to all screen sizes
- **Interactive Elements**: Hover effects and transitions
- **Image Previews**: Circular product image thumbnails
- **Sorting Controls**: Intuitive data organization
- **Search Functionality**: Quick product discovery
- **Theme Toggle**: Sun/Moon icons for mode switching
- **Purple Accent**: Consistent branding throughout
- **Custom Footer**: "© 2025 The Almighty" with purple styling

## 🚀 Deployment

### Vercel Deployment
- **Status**: ✅ Successfully Deployed
- **URL**: https://oxylabs-product-crawler-ncod.vercel.app
- **Configuration**: `vercel.json` with PHP runtime
- **Entry Point**: `api/index.php` for serverless functions

### Local Development
- **Port**: 8000 (Laravel Artisan serve)
- **Database**: SQLite for development
- **Environment**: `.env` configuration

## 📚 Documentation

- **Crawler**: See `crawler-php/README.md`
- **Laravel**: See `laravel/README.md`
- **API**: Inline code documentation
- **Admin Panel**: Filament documentation
- **Deployment**: Vercel configuration in `vercel.json`

## 🤝 Contributing

This is a technical test project. For questions or feedback, please refer to the project requirements.

## 📄 License

This project is created for technical evaluation purposes.

---


**Live Demo**: [https://oxylabs-product-crawler-ncod.vercel.app](https://oxylabs-product-crawler-ncod.vercel.app)
