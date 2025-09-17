# Laravel Articles CRUD Application

A full-stack Laravel application with Docker containerization and CI/CD pipeline for managing articles with complete CRUD operations.

## 🚀 Features

- **Complete CRUD Operations** for Articles
- **Docker Containerization** for consistent development and deployment
- **GitHub Actions CI/CD Pipeline** with automated testing and deployment
- **Modern UI** with Bootstrap 5 styling
- **Database Management** with Laravel migrations
- **Automated Testing** with PHPUnit

## 📋 Article Management

- **Create** new articles with title, content, author, category, and status
- **Read** articles with pagination and detailed views
- **Update** existing articles with form validation
- **Delete** articles with confirmation dialogs
- **Categories**: Technology, Business, Lifestyle, Health, Education
- **Status**: Draft, Published, Archived

## 🛠️ Tech Stack

- **Backend**: Laravel 10.x
- **Frontend**: Blade templates with Bootstrap 5
- **Database**: MySQL 8.0
- **Containerization**: Docker & Docker Compose
- **CI/CD**: GitHub Actions
- **Testing**: PHPUnit
- **Web Server**: Nginx

## 📦 Installation

### Prerequisites

- Docker and Docker Compose
- Git

### Quick Start

1. **Clone the repository**
   ```bash
   git clone https://github.com/thenewguy25/articles-ci-cd.git
   cd articles-ci-cd
   ```

2. **Start the application**
   ```bash
   docker-compose up -d
   ```

3. **Install dependencies and setup**
   ```bash
   docker-compose exec app composer install
   docker-compose exec app php artisan key:generate
   docker-compose exec app php artisan migrate
   ```

4. **Access the application**
   - **Web App**: http://localhost:8000
   - **Articles**: http://localhost:8000/articles

## 🐳 Docker Commands

### Development
```bash
# Start all services
docker-compose up -d

# View logs
docker-compose logs -f

# Stop services
docker-compose down

# Rebuild containers
docker-compose up -d --build
```

### Laravel Commands
```bash
# Run migrations
docker-compose exec app php artisan migrate

# Run tests
docker-compose exec app php artisan test

# Create new controller
docker-compose exec app php artisan make:controller ControllerName

# Access container shell
docker-compose exec app bash
```

## 🧪 Testing

The application includes comprehensive test coverage:

```bash
# Run all tests
docker-compose exec app php artisan test

# Run specific test
docker-compose exec app php artisan test --filter ArticleTest
```

### Test Coverage
- ✅ **Article Creation** - Validates form submission and database storage
- ✅ **Article Listing** - Tests index page functionality
- ✅ **Article Viewing** - Tests individual article display
- ✅ **Database Operations** - Tests CRUD operations with factory data

## 🔄 CI/CD Pipeline

The project includes a complete GitHub Actions CI/CD pipeline:

### Pipeline Stages

1. **Test Phase**
   - PHPUnit test execution
   - Composer dependency installation
   - Database connection testing
   - Code quality checks

2. **Build Phase** (on main branch)
   - Docker image building
   - Push to Docker Hub
   - Production deployment preparation

### Workflow Triggers
- **Push to main/develop branches**
- **Pull requests to main**
- **Manual workflow dispatch**

## 📁 Project Structure

```
articles-ci-cd/
├── .github/workflows/          # GitHub Actions CI/CD
├── articles/                   # Laravel application
│   ├── app/
│   │   ├── Http/Controllers/   # Article CRUD controller
│   │   └── Models/             # Article model
│   ├── database/
│   │   ├── factories/          # Test data factories
│   │   └── migrations/        # Database migrations
│   ├── resources/views/        # Blade templates
│   │   └── articles/          # Article views (CRUD)
│   ├── tests/                 # PHPUnit tests
│   └── routes/                # Application routes
├── docker/                    # Docker configuration
├── docker-compose.yml         # Development environment
├── docker-compose.prod.yml    # Production environment
└── Dockerfile                 # Application container
```

## 🌐 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/articles` | List all articles |
| GET | `/articles/create` | Show create form |
| POST | `/articles` | Store new article |
| GET | `/articles/{id}` | Show specific article |
| GET | `/articles/{id}/edit` | Show edit form |
| PUT | `/articles/{id}` | Update article |
| DELETE | `/articles/{id}` | Delete article |

## 🔧 Configuration

### Environment Variables
Copy `.env.example` to `.env` and configure:
```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_articles
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### Docker Services
- **app**: Laravel application (PHP-FPM)
- **nginx**: Web server
- **db**: MySQL database

## 🚀 Deployment

### Production Setup
1. **Configure production environment**
   ```bash
   cp .env.example .env.production
   # Update production values
   ```

2. **Use production Docker Compose**
   ```bash
   docker-compose -f docker-compose.prod.yml up -d
   ```

3. **Set up CI/CD secrets**
   - `DOCKER_USERNAME`: Your Docker Hub username
   - `DOCKER_PASSWORD`: Your Docker Hub password/token

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

If you encounter any issues:

1. Check the [Issues](https://github.com/thenewguy25/articles-ci-cd/issues) page
2. Review the Docker logs: `docker-compose logs`
3. Ensure all services are running: `docker-compose ps`

## 🎯 Roadmap

- [ ] Add user authentication
- [ ] Implement article categories management
- [ ] Add image upload functionality
- [ ] Implement search and filtering
- [ ] Add API endpoints for mobile apps
- [ ] Implement caching for better performance

---

**Built with ❤️ using Laravel, Docker, and GitHub Actions**
