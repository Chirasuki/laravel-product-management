# 🛒 Laravel Product Management

A **Product Management System** built with **Laravel** that demonstrates CRUD operations with additional features such as search, sorting, pagination, and modern UI interactions.

This project is designed as a **practice project for backend and full-stack development**, focusing on building a clean and functional admin interface.

---

## 🚀 Features

| Feature          | Description                            |
| ---------------- | -------------------------------------- |
| Create Product   | Add new product to the database        |
| Product List     | View all products in a table           |
| Edit Product     | Update product information             |
| Delete Product   | Delete product with confirmation modal |
| Search           | Search product by name                 |
| Sort             | Sort product by name or price          |
| Pagination       | Handle large data sets efficiently     |
| Success Alert    | Notification after create/edit/delete  |
| SweetAlert Modal | Modern confirmation dialog             |

---

## 🧰 Tech Stack

| Technology       | Usage                      |
| ---------------- | -------------------------- |
| **Laravel**      | Backend Framework          |
| **PHP**          | Server-side language       |
| **MySQL**        | Database                   |
| **Blade**        | Template Engine            |
| **Tailwind CSS** | UI Styling                 |
| **SweetAlert2**  | Alert & confirmation modal |

---

## 📦 Installation

Clone the repository

```bash
git clone https://github.com/chirasuki/laravel-product-management.git
```

Go to the project directory

```bash
cd laravel-product-management
```

Install dependencies

```bash
composer install
```

Create environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure your database in `.env`

Run migrations

```bash
php artisan migrate
```

Start development server

```bash
php artisan serve
```

Open in browser

```
http://127.0.0.1:8000
```

---

## 📂 Project Structure

```
app
 ├── Models
 │    └── Product.php
 │
 ├── Http
 │    └── Controllers
 │         └── ProductController.php

resources
 └── views
      └── products
           ├── index.blade.php
           ├── create.blade.php
           └── edit.blade.php
```

---

## 📸 Screenshots



### Product List

* Search product
* Sort product
* Pagination

### Add Product

* Create product form
* Validation error message

### Delete Confirmation

* SweetAlert confirmation modal before deleting product

---

## 🔮 Future Improvements

* Live search with AJAX
* Product image upload
* REST API version
* User authentication & roles
* Dashboard statistics

---

## 👨‍💻 Author

Developed by **Chirasuki**

GitHub:
https://github.com/chirasuki
