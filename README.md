# 🎮 Steam Clone

A full-stack web application inspired by the Steam gaming platform, built as an apprenticeship project during the final year of technical school (ITIS Marconi, Catania).

**Backend:** Laravel (PHP) · **Frontend:** Angular · **Auth:** JWT · **DB:** MySQL

---

## 👥 Team

This was a team project. I ([@KelvinO99](https://github.com/KelvinO99)) worked on the **backend**: API design, database schema, controllers, authentication, and query logic.

The frontend was built by teammates. Some backend contributions also appear in the frontend integration layer.

---

## 📋 Features

### Backend (Laravel REST API)
- **JWT Authentication** — register, login, logout, token refresh, user profile
- **Role-based access control** — user / developer / admin roles via Spatie/Laratrust permissions
- **Games catalogue** — full CRUD with advanced filtering:
  - Filter by tag (multi-tag support)
  - Best sellers, most reviewed, discounted, special offers, upcoming releases
  - Pagination and search by name/price
- **User library** — purchase and manage owned games
- **Reviews** — create and manage game reviews
- **Achievements** — per-game achievements and user progress tracking
- **Friendships** — send, accept, and manage friend requests
- **Developers** — developer profiles linked to games
- **Media** — image upload and management for games
- **System requirements** — min/recommended specs per game
- **Localization** — multi-language support per game (languages table)

### Frontend (Angular)
- **Store page** — featured games, carousels, offers, category browsing
- **Game page** — full game details, reviews, system requirements, buy button
- **User page** — profile, library, achievements, friends
- **Admin panel** — manage games, developers, tags
- **Cart / Buy page** — purchase flow
- **Category page** — browse by genre with filters
- **Steam Deck page** — dedicated landing page
- **i18n** — Italian and English support (`ngx-translate`)
- **Auth guard** — protected routes with JWT interceptor

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8, Laravel 10 |
| Frontend | Angular 15, TypeScript, SCSS |
| Database | MySQL |
| Authentication | JWT (`tymon/jwt-auth`) |
| Permissions | Spatie Laratrust |
| Enums | `spatie/laravel-enum` |
| API | RESTful JSON API |
| Version control | Git (750+ commits) |

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Node.js >= 16 + npm
- Angular CLI

### Backend Setup

```bash
cd backend

# Install dependencies
composer install
composer dump-autoload

# Environment
cp .env.example .env
# Edit .env with your DB credentials, then:
php artisan key:generate
php artisan jwt:secret

# Database
php artisan migrate
php artisan db:seed   # seed all via DatabaseSeeder

# Start server
php artisan serve
```

### Frontend Setup

```bash
cd frontend
npm install
ng serve
```

The app will be available at `http://localhost:4200`, API at `http://localhost:8000`.

---

## 🔄 Useful Laravel Commands

### Migrations & Seeding
```bash
php artisan make:migration create_table_name   # create a migration
php artisan migrate                             # run migrations
php artisan migrate:fresh                       # drop all tables and re-migrate

php artisan make:seeder NameSeeder             # create a seeder
php artisan db:seed                            # seed all (via DatabaseSeeder)
php artisan db:seed --class=NameSeeder         # seed a specific class

php artisan make:factory NameFactory           # create a factory
```

### Models, Controllers, Routes
```bash
php artisan make:model ModelName              # create a model
php artisan make:controller NameController    # create a controller
php artisan make:controller NameController --resource  # controller with CRUD methods
```

### Route & Config Cache (run after changing routes)
```bash
composer dump-autoload
php artisan config:clear
php artisan route:clear
php artisan route:cache
php artisan serve
```

> ⚠️ Always stop the server before clearing routes, then restart with `php artisan serve`.

### JWT Setup
```bash
composer require tymon/jwt-auth
php artisan jwt:secret    # generates JWT_SECRET in .env
php artisan make:controller AuthController
```

### Roles & Permissions (Laratrust)
```bash
composer require santigarcor/laratrust
composer dump-autoload
```

Check user roles in code:
```php
$user->hasRole('admin');
$user->hasRole(['admin', 'developer']);  // true if user has any of these
```

### Enums (Spatie)
```bash
composer require spatie/laravel-enum
composer dump-autoload
```

Enum files go in `app/Enums/`.

---

## 📡 API Endpoints

All endpoints are prefixed with `/api`.

### Auth (`/api/auth`)
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/login` | Login and get JWT token |
| POST | `/register` | Register new user (or developer) |
| POST | `/logout` | Invalidate token |
| POST | `/refresh` | Refresh JWT token |
| GET | `/user-profile` | Get authenticated user info |

### Games (`/api/games`)
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/index` | List games (filters: `tag`, `best_seller`, `most_reviewed`, `discount`, `upcoming`, `new_release`, `name`, `price`, `skip`, `take`) |
| GET | `/show/{id}` | Get single game |
| POST | `/store` | Create game |
| POST | `/update/{id}` | Update game |
| DELETE | `/destroy/{id}` | Delete game |

Other resource endpoints follow the same CRUD pattern:
`/achievements`, `/developers`, `/libraries`, `/reviews`, `/tags`, `/users`, `/images`, `/languages`, `/system_requirements`, `/friendships`

---

## 📚 Resources

- [Laravel Seeding Docs](https://laravel.com/docs/10.x/seeding)
- [Laravel CRUD with Resource Controllers](https://aulab.it/guide/132/model-resource-controller-e-crud-in-laravel)
- [Laravel JWT Authentication Tutorial](https://www.positronx.io/laravel-jwt-authentication-tutorial-user-login-signup-api/)
- [Laratrust Roles & Permissions](https://laratrust.santigarcor.me/docs/6.x/)

---

## 📝 Notes

- This is a school apprenticeship project — not intended for production use
- `.env` is not committed; use `.env.example` as a starting point
- Some comments in Italian are leftovers from the development process
