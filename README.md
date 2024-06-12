# Expense Management System

An expense management system built with Laravel for managing the expenses of multiple companies. This application is designed for individuals who own or manage several companies and need a comprehensive tool to track and manage their financial activities.
<p align="center">
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original-wordmark.svg" width="200" height="200"/>
</p>

## Table of Contents

- [Features](#features-)
- [Prerequisites](#prerequisites-)
- [Installation](#installation-)
- [Usage](#usage-)
- [Contributing](#contributing-)
- [Development Status](#development-status-)

## Features 🚀

- **Multi-Company Support:** Manage expenses for multiple companies from a single application.
- **User Management:** Each user has an active/inactive status to control access and permissions.
- **Expense Tracking:** Record and categorize expenses for each company.
- **Expense Categories:** Define custom categories for expenses to streamline expense tracking and reporting.
- **Payment Methods:** Manage various payment methods to track how expenses are paid.
- **User-friendly Interface:** Easy-to-use interface built with Bootstrap for a responsive design.


## Prerequisites ✅

Before you begin, ensure you have met the following requirements:

- PHP 8.2.13 or higher
- Composer
- MySQL or MariaDB
- Apache or Nginx
- Node.js and npm (for frontend assets)

## Installation 📥

Follow these steps to set up the project on your local machine:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/abdelmaoulagr/expense_management.git
    cd expense_management
    ```

2. **Install dependencies:**

    ```bash
    composer install
    npm install
    ```

3. **Create a copy of your .env file:**

    ```bash
    cp .env.example .env
    ```

4. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5. **Configure your .env file:**

    Update your `.env` file with your database credentials and other required settings.

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

7. **Seed the database (optional):**

    ```bash
    php artisan db:seed
    ```

8. **Compile the assets:**

    ```bash
    npm run dev
    ```

## Usage 📚

Start the development server:

```bash
php artisan serve
```
Visit http://localhost:8000 in your browser.

## Contributing 🤝 

Feel free to submit pull requests and issues.
## Development Status 🛠️

This project is currently under development. Features are being actively worked on and the application is not yet complete. Contributions and feedback are welcome as we continue to improve and expand the functionality of the App.
