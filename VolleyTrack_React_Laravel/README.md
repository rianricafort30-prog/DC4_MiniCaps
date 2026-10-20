# VolleyTrack — React + Vite / Laravel REST API / MySQL

This is a source overlay/starter kit, not a pre-installed Laravel vendor folder. Create the Laravel app first, then copy the files in `backend/` into it. You must run the commands on your own computer and sign in to GitHub to push; this package cannot push to your GitHub account by itself.

## Requirements
- PHP + Composer, Node.js + npm, MySQL/phpMyAdmin, Git, VS Code

## 1. Create backend
Open VS Code terminal in a working folder:
```bash
composer create-project laravel/laravel backend
cd backend
php artisan install:api
```
Copy the contents of this package's `backend/` folder into the new `backend/` folder, allowing overwrite only for the files included here (routes/api.php and app/Models/User.php if present). Do not delete Laravel's other files.

Create a database named `volleytrack` in phpMyAdmin. Edit `backend/.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=volleytrack
DB_USERNAME=root
DB_PASSWORD=
```
Then run:
```bash
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
`migrate:fresh` DROPS all tables in the configured database. Use it only on a new/dedicated project database.

Backend URL: http://127.0.0.1:8000

## 2. Start React frontend
Open a second terminal at this package's `frontend` folder:
```bash
npm install
```
Copy `.env.example` to `.env` (or create `.env`) and keep `VITE_API_URL=http://127.0.0.1:8000/api`. Then:
```bash
npm run dev
```
Open the URL Vite prints (usually http://localhost:5173).

## Demo accounts
- admin@volleytrack.test / password
- staff@volleytrack.test / password
- viewer@volleytrack.test / password

## GitHub push
1. Open your existing repository in VS Code, or clone it: `git clone https://github.com/rianricafort30-prog/DC4_FinalExamMiniCapstone.git`
2. Copy the `frontend/` folder and the backend overlay files into the repo (keep the Laravel project files created in step 1).
3. In terminal at repository root:
```bash
git status
git add .
git commit -m "Build VolleyTrack React Laravel API"
git push origin main
```
If your default branch is `master`, use `git push origin master`. Sign in to GitHub when VS Code/Git requests it. Never commit `.env`, passwords, `vendor/`, or `node_modules/`.

## Features in this starter
- Sanctum token login/logout and current-user endpoint
- Team, player, tournament, match CRUD API
- Bootstrap responsive React dashboard and record-management screens
- MySQL migrations and seeded sample users/data
- Role field: admin, staff, viewer (UI/API permission checks are basic coursework-level controls)

Check Laravel's current Sanctum setup if your installed Laravel version differs: https://laravel.com/docs/12.x/sanctum
