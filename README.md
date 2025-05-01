# TaskManager SPA

A modern **Task Manager** Single Page Application built with **Laravel**, **Vue.js**, and **TypeScript**.  
Designed with clean architecture, reusable components, and best practices following SOLID principles.

---

## 🛠️ Tech Stack

- **Laravel 12** – RESTful API Backend
- **Laravel Sanctum** – Token-based authentication
- **Enums, DTOs, Services** – Clean architecture
- **Vue 3 + TypeScript** – Frontend SPA
- **Tailwind CSS** – Modern styling
- **Axios** – HTTP requests
- **Vite** – Lightning-fast bundler

---

## 📁 Backend Structure

---

## 🌐 API Endpoints

| Method | Endpoint         | Description             |
|--------|------------------|-------------------------|
| POST   | /api/login       | User login              |
| POST   | /api/register    | User registration       |
| POST   | /api/logout      | Logout                  |
| GET    | /api/tasks       | Get all tasks           |
| POST   | /api/tasks       | Create a new task       |
| PUT    | /api/tasks/{id}  | Update a task           |
| DELETE | /api/tasks/{id}  | Delete a task           |

---

## 💻 Frontend Structure


---

## 🧪 Setup Instructions

### Backend (Laravel)

```bash
git clone https://github.com/your-username/task-manager.git
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

npm install
npm run dev

VITE_API_BASE_URL=http://127.0.0.1:8000/api




