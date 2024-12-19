### Clone this repository

```bash
git clone https://github.com/roncallyt/auction-system auction-system
```

### Access the created folder

```bash
cd auction-system
```

### Create a .env file from .env.example

```bash
cp .docker/.env.example .docker/.env
```

### Fill the environment variables like bellow:

```text
# Project
COMPOSE_PROJECT_NAME=auction-system
HOST_UID=1000 # Logged user ID

# Application Server
FRONTEND_PORT=3000
BACKEND_PORT=8000

# Database
POSTGRES_PORT=5432
POSTGRES_DB=auction
POSTGRES_USER=root
POSTGRES_PASSWORD=1234

# Mailpit
MAILPIT_PORT=1025
MAILPIT_DASHBOARD_PORT=8025
```

### Build the custom images to backend and frontend

```bash
./develop build --no-cache
```

### Install backend's dependencies

```bash
./develop composer install
```

### Create a .env file to backend from .env.example provided.

```bash
cp backend/.env.example backend/.env
```

### Generate the backend key

```bash
./develop artisan key:generate
```

### Install frontend's dependencies

```bash
./develop npm install
```

### Custom commands

```bash
# Rotines
./develop up -d   # Start application
./develop stop    # Stop application
./develop down -v # Delete application and volumes

# Docker's commands
./develop docker-command-here

# Artisan' commands
./develop artisan artisan-command-here
./develop art artisan-command-here

# Node' commands
./develop npm npm-command-here
./develop npx npx-command-here
```

### First steps after start the application

```bash
# Create a symbolic link to storage
./develop artisan storage:link

# Run migrations and seeders
./develop artisan migrate --seed
```

```text
URL: http://localhost:3000
Email: test@example.com
Senha: 12345678
```
