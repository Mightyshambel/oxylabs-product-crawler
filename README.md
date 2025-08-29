# 🧪 Oxylabs Product Crawler - Technical Test

> **Full Stack Laravel Developer Technical Test** - A comprehensive web application demonstrating advanced Laravel development skills.

## 🎯 Project Overview

This project implements a complete product data management system with web scraping, asynchronous processing, admin panel, and dynamic frontend. Built for a technical test to evaluate skills in PHP (Laravel, Filament), MySQL, JavaScript (AlpineJS, Livewire), HTML, and CSS (TailwindCSS).

## 🌐 Data Source

- **URL**: `https://sandbox.oxylabs.io/products`
- **Data Extracted**: title, price, image_url, description, category, url, extracted_at

## 🏗️ Architecture

```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   PHP Crawler   │───▶│  Laravel API    │───▶│   Database      │
│   (Step 1)      │    │   (Step 2)      │    │   (SQLite)      │
└─────────────────┘    └─────────────────┘    └─────────────────┘
                                │
                                ▼
                       ┌─────────────────┐
                       │  Filament Admin │
                       │   (Step 3)      │
                       └─────────────────┘
                                │
                                ▼
                       ┌─────────────────┐
                       │ Livewire +      │
                       │ AlpineJS Front  │
                       │   (Step 4)      │
                       └─────────────────┘
```

## ✅ Implementation Progress

### Step 1: PHP Crawler ✅
- **Status**: Complete & Tested
- **Features**:
  - Web scraping using Guzzle HTTP + Symfony DomCrawler
  - Data extraction from Oxylabs sandbox
  - JSON export format
  - Error handling and validation
- **Files**: `crawler-php/`
- **Output**: 32 products extracted successfully

### Step 2: Laravel Backend ✅
- **Status**: Complete & Tested
- **Features**:
  - Product and Image Eloquent models with relationships
  - Database migrations and schema
  - Queue system for asynchronous import
  - ImportProductsJob for background processing
  - POST /api/import endpoint with validation
  - Error handling and logging
- **Files**: `laravel/app/Models/`, `laravel/app/Jobs/`, `laravel/app/Http/Controllers/`
- **Database**: SQLite with proper relationships

### Step 3: Filament Admin Panel ✅
- **Status**: Complete & Tested
- **Features**:
  - Professional admin interface at `/admin`
  - ProductResource with full CRUD operations
  - ImagesRelationManager for image management
  - Product listing with image previews
  - Search, filtering, and sorting capabilities
  - Responsive design with TailwindCSS
- **Files**: `laravel/app/Filament/`
- **Access**: admin@example.com / password

### Step 4: Livewire + AlpineJS Frontend 🚧
- **Status**: In Progress
- **Planned Features**:
  - Public products page at `/view/products`
  - Pagination (25 products per page)
  - Sorting by date, price, category
  - Dynamic interactions with Livewire
  - Responsive design with AlpineJS
  - Real-time updates without page reload

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

## 🔧 Key Features

- **Asynchronous Processing**: Queue-based import system
- **Real-time Updates**: Livewire components for dynamic UI
- **Responsive Design**: Mobile-first approach with TailwindCSS
- **Admin Management**: Professional Filament admin interface
- **Data Validation**: Comprehensive input validation and error handling
- **Image Management**: Product image handling with relationships
- **Search & Filter**: Advanced product discovery features

## 📝 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/import` | Import products from JSON data |
| `GET` | `/admin` | Admin panel access |
| `GET` | `/view/products` | Public products page (planned) |

## 🎨 UI/UX Features

- **Dark Theme**: Modern, professional appearance
- **Responsive Grid**: Adapts to all screen sizes
- **Interactive Elements**: Hover effects and transitions
- **Image Previews**: Circular product image thumbnails
- **Sorting Controls**: Intuitive data organization
- **Search Functionality**: Quick product discovery

## 🚧 Roadmap

- [x] PHP Crawler implementation
- [x] Laravel backend with models and API
- [x] Filament admin panel
- [ ] Livewire + AlpineJS frontend
- [ ] Advanced filtering and search
- [ ] User authentication system
- [ ] API rate limiting
- [ ] Performance optimization

## 📚 Documentation

- **Crawler**: See `crawler-php/README.md`
- **Laravel**: See `laravel/README.md`
- **API**: Inline code documentation
- **Admin Panel**: Filament documentation

## 🤝 Contributing

This is a technical test project. For questions or feedback, please refer to the project requirements.

## 📄 License

This project is created for technical evaluation purposes.

---

**Built with ❤️ using Laravel, Filament, Livewire, and AlpineJS**
