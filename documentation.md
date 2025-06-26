# Cyberpunk Network Control Panel - Complete Documentation

## Project Overview

This is a Laravel 11 application called "Cyberpunk Network Control Panel" that provides a visually immersive cyberpunk-themed network infrastructure management platform. The application features user authentication, role-based access control, and comprehensive CRUD functionality for managing network nodes.

### Key Features
- **Cyberpunk Aesthetic**: Custom CSS with neon colors, glitch effects, animated backgrounds
- **User Authentication**: Complete registration, login, and logout system
- **Network Node Management**: Full CRUD operations for network infrastructure
- **Role-Based Access**: User roles with appropriate permissions
- **Responsive Design**: Mobile-friendly interface with consistent cyberpunk styling

### Technologies

- **PHP 8.2+**
- **Laravel 11.45.1**
- **SQLite** (default database)
- **Blade** templating engine
- **Custom CSS** with cyberpunk styling
- **Session-based authentication**

## Installation & Setup

### Local Development
```bash
# Clone repository
git clone [repository-url]
cd web-platform-cyberpunk-style

# Install dependencies
composer install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate

# Start development server
php artisan serve
```

### Docker Deployment
```bash
# Build and run with Docker Compose
docker-compose up -d

# Run migrations inside container
docker-compose exec app php artisan migrate
```

## Project Structure

### Application Layer (`app/`)

#### Controllers (`app/Http/Controllers/`)
- **`AuthController.php`**: Handles authentication operations
  - `showLoginForm()`: Displays login page
  - `login()`: Processes user login with credential validation
  - `showRegistrationForm()`: Displays registration page
  - `register()`: Creates new users with password hashing
  - `logout()`: Handles user logout and session cleanup

- **`DashboardController.php`**: Main dashboard functionality
  - `index()`: Shows user dashboard with profile information
  - `updateProfile()`: Allows users to update their name

- **`NodeController.php`**: Network node management
  - `index()`: Lists all network nodes
  - `create()`: Shows node creation form
  - `store()`: Creates new nodes with validation
  - `edit()`: Shows node editing form
  - `update()`: Updates existing nodes
  - `destroy()`: Deletes nodes

#### Models (`app/Models/`)
- **`User.php`**: User model with authentication features
  - Fields: `id`, `name`, `email`, `password`, `role`
  - Hidden: `password`, `remember_token`
  - Uses Laravel's authentication traits

- **`Node.php`**: Network node model
  - Fields: `id`, `name`, `ip_address`, `description`, `created_at`, `updated_at`
  - Mass assignable: `name`, `ip_address`, `description`

#### Middleware (`app/Http/Middleware/`)
- **`Authenticate.php`**: Protects routes requiring authentication
- **`EncryptCookies.php`**: Encrypts cookies for security
- **`TrimStrings.php`**: Trims whitespace from inputs
- **`VerifyCsrfToken.php`**: CSRF protection

### Database Layer (`database/`)

#### Migrations
- **`2024_01_01_000000_create_users_table.php`**
  - Creates users table with id, name, email, password, role fields
  - Sets default role as "user"
  - Includes timestamps and remember_token

- **`2024_01_01_000001_create_nodes_table.php`**
  - Creates nodes table for network infrastructure
  - Fields: id, name, ip_address, optional description
  - Includes timestamps

- **`2025_06_26_085557_create_sessions_table.php`**
  - Session storage table with user_id foreign key
  - Includes IP address, user agent, payload, last_activity

- **`2025_06_26_085653_create_cache_table.php`**
  - Cache and cache_locks tables for performance optimization

### View Layer (`resources/views/`)

#### Authentication Views (`auth/`)
- **`login.blade.php`**: Login form with cyberpunk styling
  - Email/password inputs with validation
  - Neon-styled submit button
  - Link to registration page

- **`register.blade.php`**: Registration form
  - Name, email, password, password confirmation
  - Consistent cyberpunk design
  - Link to login page

#### Main Application Views
- **`welcome.blade.php`**: Landing page
  - Conditional navigation based on authentication status
  - Links to login/register or dashboard/nodes

- **`dashboard.blade.php`**: User dashboard
  - Displays user information
  - Profile update form
  - Cyberpunk-styled interface

#### Network Nodes Views (`nodes/`)
- **`index.blade.php`**: Network nodes listing
  - Table displaying all nodes with name, IP, status, description
  - "Configure" and "Delete" action buttons
  - "Add New Node" creation link

- **`create.blade.php`**: Node creation form
  - Input fields for name, IP address, optional description
  - Form validation and error handling

- **`edit.blade.php`**: Node editing form
  - Pre-populated form fields
  - Update and cancel options

#### Layout
- **`layouts/app.blade.php`**: Base application layout
  - Cyberpunk grid background pattern
  - Floating particle animations
  - Navigation bar with connection status indicator
  - Authentication-aware navigation links
  - Responsive design

### Styling (`public/css/app.css`)

#### Color Scheme
- **Primary Colors**: Neon magenta (`#ff00ff`), cyan (`#00ffff`), violet (`#8a2be2`)
- **Background**: Dark theme with gradients
- **Text**: High contrast with neon accents

#### Visual Effects
- **Glow Effects**: Text and border glows with CSS shadows
- **Flicker Animation**: Simulates unstable neon lighting
- **Glitch Effects**: Text distortion animations
- **Pulsing Elements**: Breathing light effects
- **Grid Background**: Animated cyberpunk grid pattern
- **Floating Particles**: CSS-animated background elements

#### Interactive Elements
- **Buttons**: Neon-styled with hover effects
- **Forms**: Glowing input fields with focus states
- **Cards**: Elevated panels with glowing borders
- **Navigation**: Responsive with visual feedback

### Configuration (`config/`)

#### Application Configuration (`app.php`)
- App name: "Cyberpunk Network Control Panel"
- Environment: Local development
- Debug mode: Enabled for development
- URL: http://127.0.0.1:8000
- Timezone: UTC
- Locale: English

### Routes (`routes/web.php`)

#### Public Routes
- `GET /`: Welcome page (landing)
- `GET /login`: Login form
- `POST /login`: Process login
- `GET /register`: Registration form
- `POST /register`: Process registration
- `POST /logout`: User logout

#### Protected Routes (requires authentication)
- `GET /dashboard`: User dashboard
- `POST /dashboard/update-profile`: Update user profile
- `Resource /nodes`: Full CRUD for network nodes
  - `GET /nodes`: List all nodes
  - `GET /nodes/create`: Show creation form
  - `POST /nodes`: Store new node
  - `GET /nodes/{id}/edit`: Show edit form
  - `PUT /nodes/{id}`: Update node
  - `DELETE /nodes/{id}`: Delete node

## Architecture Patterns

### MVC Pattern
```
┌─────────────────┐    ┌──────────────────┐    ┌─────────────────┐
│     MODEL       │    │    CONTROLLER    │    │      VIEW       │
│                 │    │                  │    │                 │
│ • User.php      │◄──►│ • AuthController │◄──►│ • Blade Templates│
│ • Node.php      │    │ • DashController │    │ • Layouts       │
│ • Eloquent ORM  │    │ • NodeController │    │ • Components    │
└─────────────────┘    └──────────────────┘    └─────────────────┘
```

### Request Lifecycle
```
┌─────────────┐
│   Browser   │
└─────┬───────┘
      │ HTTP Request
      ▼
┌─────────────┐
│ routes/web  │
└─────┬───────┘
      │ Route Resolution
      ▼
┌─────────────┐
│ Middleware  │ (Authentication, CSRF, etc.)
└─────┬───────┘
      │
      ▼
┌─────────────┐
│ Controller  │ (Business Logic)
└─────┬───────┘
      │
      ▼
┌─────────────┐
│   Model     │ (Database Operations)
└─────┬───────┘
      │
      ▼
┌─────────────┐
│    View     │ (Blade Template Rendering)
└─────┬───────┘
      │ HTML Response
      ▼
┌─────────────┐
│   Browser   │
└─────────────┘
```

### Authentication Flow
```
┌─────────────┐    ┌──────────────┐    ┌─────────────┐
│    Login    │───►│ Credentials  │───►│  Session    │
│    Form     │    │ Validation   │    │  Creation   │
└─────────────┘    └──────────────┘    └─────────────┘
                           │                   │
                           ▼                   ▼
┌─────────────┐    ┌──────────────┐    ┌─────────────┐
│  Protected  │◄───│ Middleware   │◄───│ Subsequent  │
│   Routes    │    │    Check     │    │  Requests   │
└─────────────┘    └──────────────┘    └─────────────┘
```

## Security Features

### Authentication & Authorization
- **Session-based authentication** with Laravel's built-in system
- **Password hashing** using bcrypt
- **CSRF protection** on all forms
- **Role-based access control** with user roles
- **Route protection** via authentication middleware

### Data Validation
- **Input validation** on all forms
- **XSS protection** through Blade templating
- **SQL injection prevention** via Eloquent ORM
- **Cookie encryption** for session security

## Development Workflow

### Local Development
1. Clone repository
2. Install dependencies with Composer
3. Configure environment variables
4. Run database migrations
5. Start development server
6. Access application at http://127.0.0.1:8000

### File Structure Navigation
- Controllers: Handle HTTP requests and business logic
- Models: Represent data and database interactions
- Views: Render HTML responses with Blade templating
- Routes: Define URL endpoints and middleware
- Migrations: Version control for database schema
- CSS: Custom cyberpunk styling and animations

### Customization Points
- **Styling**: Modify `public/css/app.css` for visual changes
- **Authentication**: Extend `AuthController` for additional features
- **Node Management**: Add fields to `Node` model and update views
- **Roles**: Expand role system in `User` model
- **Dashboard**: Customize dashboard functionality in `DashboardController`

## Dependencies (composer.json)

### Core Requirements
- **PHP**: ^8.2
- **Laravel Framework**: ^11.0
- **Guzzle HTTP**: ^7.2 (HTTP client)
- **Laravel Sanctum**: ^4.0 (API authentication)
- **Laravel Tinker**: ^2.9 (REPL)

### Autoloading
- **PSR-4**: `App\` namespace maps to `app/` directory
- **Classmap**: Database migrations and seeders
- **Files**: Helper functions

## Future Enhancement Opportunities

1. **API Development**: Add RESTful API endpoints for mobile app integration
2. **Real-time Features**: Implement WebSocket connections for live node monitoring
3. **Advanced Roles**: Expand role system with granular permissions
4. **Node Monitoring**: Add ping/status checking for network nodes
5. **Data Visualization**: Charts and graphs for network analytics
6. **Export/Import**: CSV/JSON data exchange capabilities
7. **Notifications**: Email/SMS alerts for node status changes
8. **Audit Logging**: Track user actions and system changes
9. **Multi-tenancy**: Support for multiple organizations
10. **Advanced Search**: Filtering and search capabilities for nodes

This documentation provides a comprehensive overview of the Cyberpunk Network Control Panel application, covering all aspects from installation to customization. The modular Laravel architecture makes it easy to extend and maintain while preserving the distinctive cyberpunk aesthetic.
