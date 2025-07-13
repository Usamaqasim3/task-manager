# 📝 Laravel Task Manager

A simple task management application built with Laravel 11. Authenticated users can manage their personal tasks — including creation, editing, deletion, and viewing. The project uses Laravel Breeze for authentication and Bootstrap 5 for styling.

---

## ⚙️ Setup Instructions

Follow the steps below to run this project locally:

1. Clone the repository  
   git clone https://github.com/your-username/task-manager.git  
   cd task-manager

2. Install dependencies  
   composer install  
   npm install

3. Copy `.env` file  
   cp .env.example .env

4. Configure your `.env` with database settings:

   DB_CONNECTION=mysql  
   DB_DATABASE=task_manager  
   DB_USERNAME=root  
   DB_PASSWORD=

5. Generate app key  
   php artisan key:generate

6. Run migrations  
   php artisan migrate

7. Compile frontend assets  
   npm run dev

8. Serve the application  
   php artisan serve

Visit: http://localhost:8000

---

## 💡 Approach

- Authentication is handled using Laravel Breeze with Blade.
- Users must be logged in to manage tasks.
- Each task belongs to a user (`user_id` foreign key).
- RESTful routing with `Route::resource('tasks', TaskController::class)`.
- Form validation with `$request->validate(...)`.
- Flash messages for feedback.
- UI styled with Bootstrap 5.
- Code structured using proper MVC architecture.

---

## 📦 Features

- ✅ User registration & login
- ✅ Task creation, editing, deleting, and viewing
- ✅ Flash messages for success/error feedback
- ✅ Form validation and error display
- ✅ Tasks are user-specific
- ✅ Pagination in task list
- ✅ Clean Bootstrap 5 UI

---

## ⚠️ Known Issues / Assumptions

- No role-based access control — all users are equal.
- Tasks are private to each user — no sharing or teams.
- No search or filtering (can be added).
- Status field is limited to: `pending`, `in_progress`, `completed`.


---

## 👤 Author

**Usama Qasim** — Laravel Developer  

---

## 📄 License

This project is open-sourced for demonstration purposes only.
