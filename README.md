# 🧑‍💼 Employee Management System

A full-featured **Employee Management System** built with **PHP, MySQL, AJAX, jQuery, and Bootstrap**. Manage employees, track workforce analytics, and control access — all without a single page reload.

## 🌐 Live Demo

**👉 [http://employee123.site.je/login.php](http://employee123.site.je/login.php)**

| | |
|---|---|
| **Username** | `admin` |
| **Password** | `admin123` |

> This is a demo deployment with sample data. Feel free to explore — add, edit, delete employees and check the analytics pages.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white)

---

## ✨ Features

- 🔐 **Secure Authentication** — Session-based login with hashed passwords (`password_hash`/`password_verify`)
- 📊 **Interactive Dashboard** — Real-time stats cards (total employees, departments, payroll, average salary) and a live department-distribution chart
- 👥 **Full CRUD Operations** — Add, edit, delete, and view employees — all via AJAX, with zero page reloads
- 🔍 **Live Search & Filtering** — Instant search across name/email/department, combined with a department dropdown filter
- 📈 **Analytics & Reports** — Average salary per department, salary-range distribution, and a top-5 highest-paid employees leaderboard
- ⚙️ **Account Settings** — Change password with current-password verification
- 🛡️ **Security First** — PDO prepared statements (SQL Injection protection), input sanitization (XSS protection), and route guards on every protected page

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP (PDO) |
| Database | MySQL |
| Frontend | HTML5, CSS3, Bootstrap 5 |
| Interactivity | JavaScript, jQuery, AJAX |
| Charts | Chart.js |
| Icons | Bootstrap Icons |

---

## 📸 Screenshots

> Add your own screenshots here after cloning — a picture of the Dashboard, Employees, and Reports pages works great for a GitHub README.

```
![Dashboard](screenshots/dashboard.png)
![Reports](screenshots/reports.png)
```

---

## 📂 Project Structure

```
employee-management-system/
├── config.php                  # Database connection (PDO)
├── login.php                    # Login page + authentication
├── logout.php                    # Session destroy
├── create_admin.php              # One-time script to create the first admin user
├── dashboard.php                  # Main dashboard — stats + chart + employee table
├── employees.php                  # Full employee directory page
├── reports.php                     # Analytics & reports page
├── settings.php                     # Account settings — change password
├── schema.sql                        # Database schema + sample data
│
├── actions/                           # AJAX backend endpoints (return JSON only)
│   ├── search_employee.php             # List/search/filter employees
│   ├── add_employee.php                 # Create employee
│   ├── edit_employee.php                 # Update employee
│   ├── get_employee.php                   # Fetch single employee (for edit form)
│   ├── delete_employee.php                 # Delete employee
│   ├── get_stats.php                         # Dashboard stats + chart data
│   ├── get_reports.php                        # Reports page analytics
│   └── change_password.php                     # Password update logic
│
└── assets/
    ├── style.css                # All styling
    ├── script.js                 # Dashboard AJAX logic
    ├── employees.js                # Employees page AJAX logic
    ├── reports.js                   # Reports page charts logic
    └── settings.js                    # Settings page logic
```

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) / [WAMP](https://www.wampserver.com/) (or any PHP 7.4+ & MySQL environment)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/employee-management-system.git
   ```

2. **Move the project** into your server's web root
   - XAMPP: `C:\xampp\htdocs\`
   - WAMP: `C:\wamp64\www\`

3. **Import the database**
   - Open `phpMyAdmin` → `Import` → select `schema.sql` → `Go`
   - This creates the `employee_management` database with sample data

4. **Create the admin account** (one-time step)
   ```
   http://localhost/employee-management-system/create_admin.php
   ```
   Default credentials created:
   - **Username:** `admin`
   - **Password:** `admin123`

   > ⚠️ Delete `create_admin.php` after running it once, for security.

5. **Login and explore**
   ```
   http://localhost/employee-management-system/login.php
   ```

---

## 🔒 Security Practices Used

- **PDO Prepared Statements** — every database query uses parameter binding to prevent SQL Injection
- **Password Hashing** — passwords are never stored in plain text (`password_hash()` / `password_verify()`)
- **Input Sanitization** — `htmlspecialchars()` and `filter_var()` guard against XSS and malformed input
- **Route Guards** — every protected page checks `$_SESSION['user_id']` before rendering
- **Server-Side Validation** — all inputs are re-validated on the backend, never trusting client-side checks alone

---

## 🗺️ Roadmap / Possible Improvements

- [ ] Role-based access control (Admin / Manager / Viewer)
- [ ] Pagination for large employee lists
- [ ] Export employee data to Excel/PDF
- [ ] Employee profile photo upload
- [ ] Email notifications on employee updates
- [ ] Public registration flow with email verification

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 🙋‍♂️ Author

**MD Rehan**
Full Stack Web Developer — HTML, CSS, Bootstrap, JavaScript, PHP, Laravel, React JS

🌐 Live Demo: [employee123.site.je](http://employee123.site.je/login.php)

If you found this project useful, consider giving it a ⭐ on GitHub!
