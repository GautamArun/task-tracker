# TaskTracker

A simple task management system built with Laravel.

## Features

### Authentication
- Login / Logout using Laravel Breeze
- Protected routes for authenticated users

### Admin
- Manage Users (Create, Edit, Delete, List)
- Manage Tasks (Create, Edit, Delete, List)
- Assign tasks to employees

### Employee
- View assigned tasks
- Update task status

### API
- Authenticated task listing endpoint (use tinker to generate token)
- Returns tasks assigned to logged-in user in JSON format

---

## Tech Stack

- Laravel
- PHP
- MySQL
- Laravel Breeze
- Laravel Sanctum
- Blade + Tailwind CSS

---

## Database Seeder

The project includes a `UserSeeder` for quick testing (includes one account for admin and another one for employee). Just run php artisan db:seed

---

## API Endpoint

### Get Logged-in User Tasks
GET /api/tasks

To generate API Token run: 
1. php artisan tinker
2. $user = App\Models\User::where('email', 'admin@test.com')->first();
3. $user->createToken('api-token')->plainTextToken;