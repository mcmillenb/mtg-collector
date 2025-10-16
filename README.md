# Magic: The Gathering Card Collector

A Laravel + Vue.js application for searching and collecting Magic: The Gathering cards using the Scryfall API.

## Quick Setup

**Requirements:**
- PHP 8.2+
- Node.js 18+
- Composer
- SQLite (usually included with PHP)

**Installation:**
```bash
# Clone and setup
git clone <your-repo-url>
cd magic-collector

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate

# Build frontend
npm run build
```

## Development

**Start the app:**
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server (for hot reloading)
npm run dev
```

Visit: http://localhost:8000

## Commands

```bash
# Code formatting
composer lint

# Testing
composer test

# Build for production
npm run build
```

## Features

- 🔍 Search Magic cards via Scryfall API
- 📚 Personal collection management
- 🔢 Quantity tracking for duplicate cards
- 🎨 Modern Vue 3 + Tailwind UI
- ⚡ Hot module reloading with Vite