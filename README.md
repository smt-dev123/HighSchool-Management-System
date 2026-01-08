# Student Management System (SMS)

A modern **web-based Student** built with **Laravel + Inertia.js + Vue 3 + Element Plus**, designed for school administrators to manage academic years, students, classes, exam and attendance.

---

## 🧩 Features

### UI / UX

- Built with **Vue 3 + Element Plus**
- Client-Side Rendering (CSR) for fast interaction
- Responsive tables with search, pagination, and sorting
- Modal dialogs for Create, Update, Delete actions

### Authentication

- Login / Logout
- Role-based access control

---

## ⚙️ Tech Stack

| Layer            | Technology                      |
| ---------------- | ------------------------------- |
| Backend          | Laravel 12, PHP 8.4+            |
| Frontend         | Vue 3, Element Plus, Inertia.js |
| Database         | PostgreSQL                      |
| Icons            | Lucide Vue Next                 |
| State Management | Inertia forms (`useForm`)       |

---

## 🛠 Installation

1. **Clone repository**

```bash
git clone https://github.com/smt-dev123/student-management-system.git
cd student-management-system


Install dependencies

composer install
npm install


Environment setup

cp .env.example .env


Configure database (PostgreSQL) in .env

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=student_management_system
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password


Generate app key

php artisan key:generate


Run migrations

php artisan migrate


Compile assets

npm run dev


Serve application

php artisan serve


Open http://127.0.0.1:8000
 in your browser

📦 Folder Structure
app/
  Models/
  Http/Controllers/
  Providers/
database/
  migrations/
resources/
  js/
    Pages/           # Vue 3 pages (Inertia)
    Components/      # Reusable components (Create, Update, Delete dialogs)
    Layouts/         # App layout

👨‍💻 Author

[SMT-CS] – [luysokmatra3@gmail.com
]
```
