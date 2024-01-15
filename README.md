# Clean Architecture PHP Project with AdminLTE

This is a sample PHP project showcasing the Clean Architecture pattern with the AdminLTE dashboard, including authentication (JWT-based login and registration) and CRUD operations for the "Books" entity.

## Prerequisites

- PHP
- Composer
- MySQL

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/clean-architecture-example.git
   cd clean-architecture-example

2. **Install Dependencies:**

   ```bash
   composer install

3. **Set Up Database**

   Create MySQL Database and import the SQL schema from database.sql

4. **Configure Environment Variables**

   Copy the `.env.example` file to `.env`

## Usage

1. **Run the PHP built-in server:

   ```bash
   php -S localhost:8000 -t public


# Clean Architecture PHP Project Structure

This PHP project follows the Clean Architecture pattern, organizing its codebase into distinct layers to promote maintainability and testability. The main folders and their purposes are outlined below:

## Folder Structure

- **`src/`**: Contains the main source code with three primary layers:
  - **`Application/`**: Bridges the gap between the domain and infrastructure layers.
    - **`Auth/`**: Handles authentication use cases (`LoginUseCase.php`, `RegisterUseCase.php`).
    - **`Book/`**: Manages book-related functionality (`Book.php`, `BookRepository.php`, `BookService.php`).
  - **`Domain/`**: Encompasses entities and repository interfaces representing business logic.
    - **`Entity/`**: Defines primary entities, e.g., `Book.php`.
    - **`Repository/`**: Specifies repository interfaces, e.g., `BookRepositoryInterface.php`.
  - **`Infrastructure/`**: Provides implementations for external tools or data storage.
    - **`Auth/`**: Implements authentication logic, e.g., `JwtAuth.php`.
    - **`Database/`**: Contains database-related implementations, e.g., `BookEloquent.php`.

- **`public/`**: Holds publicly accessible files, including the entry point `index.php`.

- **`templates/`**: Consists of view templates for authentication and book-related features.
  - **`auth/`**: Authentication-related views (`login.php`, `register.php`).
  - **`book/`**: Book-related views (`index.php`, `create.php`, `edit.php`).

- **`.env`**: Configuration file for environment variables.

- **`composer.json`**: Composer configuration file.

- **`database.php`**: Database configuration file.

## Clean Architecture Overview

Clean Architecture divides an application into layers with well-defined responsibilities, promoting separation of concerns and maintainability.

- **`Application Layer`**: Interfaces with the outside world, contains use cases, and orchestrates business logic.

- **`Domain Layer`**: Houses entities representing the business logic and repository interfaces defining data access contracts.

- **`Infrastructure Layer`**: Implements external tools, frameworks, and database access, keeping them separate from the business logic.

This separation allows each layer to evolve independently, making the codebase adaptable to changes in technology or business requirements. The goal is to keep the inner layers (Domain) independent of the outer layers (Application and Infrastructure), fostering a flexible and testable architecture.

Feel free to explore each layer to understand how the Clean Architecture principles are applied to this project.
