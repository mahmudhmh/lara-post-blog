# Lara Post Blog

## Overview

This repository contains the source code for a simple blog built using PHP, Laravel, and MySQL. This blog allows users to create accounts, write posts, and interact with other users' posts through comments.

## Prerequisites

Before you begin, ensure you have the following installed:

-   PHP (>= 7.4)
-   Composer
-   Laravel (>= 8.0)
-   MySQL (>= 5.7)

## Installation

1. Clone this repository to your local machine:

```bash
git clone https://github.com/mahmudhmh/lara-post-blog.git
```

2. Navigate into the project directory:

```bash
cd blog
```

3. Install dependencies using Composer:

```bash
composer install
```

4. Configure your environment variables by copying the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

5. Generate an application key:

```bash
php artisan key:generate
```

6. Update the `.env` file with your MySQL database credentials.

7. Run the migrations to create the necessary database tables:

```bash
php artisan migrate
```

8. Optionally, seed the database with sample data:

```bash
php artisan db:seed
```

## Usage

To run the application locally, use the following command:

```bash
php artisan serve
```

Then, navigate to `http://localhost:8000` in your web browser to access the blog.

## Features

-   User Authentication: Users can register, login, and logout.
-   Create Posts: Authenticated users can create new blog posts.
-   Commenting: Users can comment on posts.
-   CRUD Operations: Authenticated users can edit and delete their own posts and comments.
-   Admin Panel: Administrators have access to a dashboard where they can manage users, posts, and comments.

## Contributing

If you would like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgements

-   Laravel documentation: [https://laravel.com/docs](https://laravel.com/docs)
-   PHP documentation: [https://www.php.net/docs.php](https://www.php.net/docs.php)
-   MySQL documentation: [https://dev.mysql.com/doc/](https://dev.mysql.com/doc/)

## Contact

For any inquiries or issues, please contact [mahmoudh.buss@gmail.com](mailto:mahmoudh.buss@gmail.com).
