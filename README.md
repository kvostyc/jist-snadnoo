# Jist SNADNOO - Restaurant Reservation System

A modern Laravel-based restaurant reservation system with real-time table management, user authentication, and admin dashboard.

![alt text](https://raw.githubusercontent.com/kvostyc/jist-snadnoo/refs/heads/main/resources/fixtures/app_preview_first.png "App Preview First")

![alt text](https://raw.githubusercontent.com/kvostyc/jist-snadnoo/refs/heads/main/resources/fixtures/app_preview_second.png "App Preview Second")

![alt text](https://raw.githubusercontent.com/kvostyc/jist-snadnoo/refs/heads/main/resources/fixtures/app_preview_third.png "App Preview Third")

![alt text](https://raw.githubusercontent.com/kvostyc/jist-snadnoo/refs/heads/main/resources/fixtures/app_preview_admin_first.png "App Admin Preview First")

![alt text](https://raw.githubusercontent.com/kvostyc/jist-snadnoo/refs/heads/main/resources/fixtures/app_preview_admin_second.png "App Admin Preview Second")

## Features

- **User Authentication**: Secure login/registration system
- **Table Management**: Interactive table map with real-time availability
- **Reservation System**: Easy booking process with date/time selection
- **Admin Dashboard**: FilamentPHP-based admin panel for managing reservations
- **Real-time Updates**: Livewire components for dynamic user experience
- **Multi-language Support**: Slovak and multilanguage support
- **Responsive Design**: Modern UI with Tailwind CSS

## Technology Stack

- **Backend**: Laravel 11, PHP 8.2+
- **Frontend**: Livewire 3, Alpine.js, Tailwind CSS
- **Admin Panel**: FilamentPHP 3
- **Database**: MySQL/PostgreSQL
- **Testing**: PHPUnit, Cypress E2E
- **Build Tool**: Vite

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL/PostgreSQL database
- Git

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/kvostyc/jist-snadnoo
   cd jist-snadnoo
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=jist_snadnoo
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Build frontend assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## Default Users

After running seeders, the following users are created:

- **Admin User**: `daniel@ibrahim.sk` / `snadnee`

## Testing

### PHPUnit Tests

Run the test suite:
```bash
php artisan test
```

Run specific test files:
```bash
php artisan test tests/Feature/ReservationTest.php
php artisan test tests/Feature/TableMapTest.php
```

### Cypress E2E Tests

1. **Install Cypress** (if not already installed)
   ```bash
   npm install cypress --save-dev
   ```

2. **Run Cypress tests**
   ```bash
   npm run cypress:run
   ```

3. **Open Cypress Test Runner** (for interactive testing)
   ```bash
   npm run cypress:open
   ```

## Project Structure

```
app/
├── Core/Services/          # Business logic services
├── Filament/              # Admin panel resources
├── Http/Controllers/      # Web controllers
├── Livewire/             # Livewire components
├── Models/               # Eloquent models
└── Notifications/        # Email & Admin Panel notifications

database/
├── factories/            # Model factories
├── migrations/           # Database migrations
└── seeders/             # Database seeders

resources/
├── views/               # Blade templates
└── lang/sk/            # Slovak translations

tests/
├── Feature/             # Feature tests
└── Unit/               # Unit tests

cypress/
└── e2e/                # Cypress E2E tests
```

## Key Components

### Services Layer
- `BaseEntityService`: Generic CRUD operations
- `ReservationService`: Reservation business logic
- `TableService`: Table management
- `UserService`: User operations

### Livewire Components
- `TableMap`: Interactive table selection
- `ReservationForm`: Reservation creation form
- `AdminNotifications`: Admin notification system

### Admin Panel
- Reservation management
- User management
- Dashboard widgets
- Real-time notifications

## API Endpoints

- `GET /` - Homepage with reservation form
- `POST /reservations` - Create new reservation
- `GET /profile` - User profile (authenticated)
- `GET /admin` - Admin dashboard (admin only)

### Production Environment Improvements

For a production environment, I would implement:

1. **Staging Environment**
   - Separate staging server for testing before production
   - Automated deployment pipeline
   - Database migrations testing in staging

2. **Git Workflow**
   - Feature branch workflow (GitFlow)
   - Pull request reviews
   - Automated merge checks
   - Semantic versioning

3. **Code Quality Tools**
   - **Laravel Pint** for code style enforcement
   - **Pre-commit hooks** for automated checks

4. **CI/CD Pipeline**
   - Automated testing on every commit
   - Code quality checks
   - Automated deployment to staging/production

5. **Monitoring & Logging**
   - Application performance monitoring, Database query optimization (for example Laravel Nightwatch)
   - User behavior analytics (Hotjar)

## Deployment

1. **Production Environment**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **Database Setup**
   ```bash
   php artisan migrate --force
   ```

3. **File Permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

## Troubleshooting

### Common Issues

1. **Permission Denied Errors**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

2. **Node Modules Issues**
   ```bash
   rm -rf node_modules package-lock.json
   npm install
   ```
