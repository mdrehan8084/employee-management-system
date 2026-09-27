# Employee Management System

PHP + MySQL + AJAX + jQuery + Bootstrap se bana hua full CRUD project, login authentication ke saath.

## Setup Steps (XAMPP/WAMP use kar rahe ho toh)

1. Is poore folder ko `htdocs` (XAMPP) ya `www` (WAMP) mein copy karo.
2. phpMyAdmin kholo, `schema.sql` file import karo (ye database aur table bana dega, sample data ke saath).
3. Browser mein jao: `http://localhost/employee-management-system/create_admin.php`
   - Ye ek baar chalne se admin user ban jayega (username: `admin`, password: `admin123`)
   - Chalne ke baad is file (`create_admin.php`) ko delete kar dena.
4. Ab `http://localhost/employee-management-system/login.php` pe jaake login karo.

## Features

- Session-based login/logout (password hashed hai — plain text kabhi store nahi hota)
- Employees ki list, bina page reload search (AJAX)
- Add / Edit / Delete — sab AJAX se, JSON response ke saath
- SQL Injection se safe (PDO prepared statements)
- XSS se safe (`htmlspecialchars` input sanitize karta hai)

## Folder Structure

```
employee-management-system/
├── config.php              # Database connection
├── login.php                # Login page
├── logout.php                # Session destroy
├── dashboard.php             # Main CRUD page
├── create_admin.php          # One-time admin setup
├── schema.sql                 # Database structure
├── actions/                   # AJAX backend handlers
│   ├── search_employee.php
│   ├── add_employee.php
│   ├── edit_employee.php
│   ├── get_employee.php
│   └── delete_employee.php
└── assets/
    ├── style.css
    └── script.js
```
