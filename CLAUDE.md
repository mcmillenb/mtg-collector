# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Magic: The Gathering card collection application built with Laravel 12, Vue 3, and Inertia.js. The app allows users to search for Magic cards via the Scryfall API and manage a personal collection with quantity tracking.

## Architecture

### Tech Stack
- **Backend**: Laravel 12 with SQLite database
- **Frontend**: Vue 3 with Composition API
- **Bridge**: Inertia.js for SPA-like experience without API complexity
- **Build Tool**: Vite with Tailwind CSS 4
- **External API**: Scryfall API for Magic card data

### Key Components

**Backend Structure:**
- `app/Models/CardCollection.php` - Eloquent model for stored cards with quantity tracking
- `app/Http/Controllers/CardController.php` - Handles Scryfall API integration for card search
- `app/Http/Controllers/CollectionController.php` - CRUD operations for user's card collection
- `routes/api.php` - API endpoints for card search and collection management
- `routes/web.php` - Inertia routes for page rendering

**Frontend Structure:**
- `resources/js/Pages/Home.vue` - Main page with card search interface
- `resources/js/Pages/Collection.vue` - Collection browser with filtering and removal
- `resources/js/Components/CardSearch.vue` - Reusable search component with Scryfall integration
- `resources/views/app.blade.php` - Root Inertia template

### Data Flow
1. User searches for cards → Vue component calls `/api/cards/search` → CardController queries Scryfall API
2. User adds cards → `/api/collection` POST → CollectionController stores in SQLite with quantity increment for duplicates
3. Collection browsing → `/collection` route → Inertia renders Collection.vue → fetches from `/api/collection`

## Development Commands

### Setup and Installation
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
```

### Development Workflow
```bash
# Start full development environment (server + queue + logs + vite)
composer dev

# Or start individual services:
php artisan serve              # Laravel server on port 8000
npm run dev                   # Vite dev server with HMR
php artisan queue:listen      # Background job processing
php artisan pail              # Real-time log monitoring
```

### Building and Testing
```bash
npm run build                 # Production Vite build
composer test                 # Run PHPUnit tests
php artisan test              # Laravel test runner
```

### Database Management
```bash
php artisan migrate           # Run pending migrations
php artisan migrate:fresh     # Drop all tables and re-migrate
php artisan tinker           # Interactive PHP shell with models loaded
```

## Database Schema

The application uses a single main table `card_collections`:
- `card_id` (string, unique) - Scryfall card identifier  
- `name` (string) - Card name
- `image_url` (text, nullable) - Card image URL from Scryfall
- `type_line` (string, nullable) - Card type (e.g., "Creature — Human Wizard")
- `set_name` (string, nullable) - Magic set name
- `mana_cost` (text, nullable) - Mana cost string
- `quantity` (integer, default 1) - Number of copies owned

## API Integration

The app integrates with Scryfall API (`https://api.scryfall.com/cards/search`) for card search. Rate limiting and error handling are implemented in `CardController::search()`. The API returns card objects with image URLs, type information, and metadata that gets stored when added to collection.

## Configuration Notes

- Inertia SSR is disabled via `INERTIA_SSR_ENABLED=false` in `.env`
- SQLite database used by default for simplicity
- Vite configured with Vue plugin and Tailwind CSS 4
- Laravel Pint available for code formatting
- Bootstrap/app.php uses new Laravel 12 configuration approach (no Kernel.php)