# Copilot / AI Agent Instructions for Student Management System

This file gives succinct, actionable guidance to AI coding agents working in this repository.

- Purpose: The app is a monorepo Laravel 12 backend with an Inertia.js + Vue 3 frontend (Vite). Backend and frontend run from the same project; changes often span PHP and JS.

- Key entry points:
  - Backend: `routes/web.php`, `app/Http/Controllers/`, `app/Models/`
  - Frontend pages/components: `resources/js/Pages/`, `resources/js/Components/`, `resources/js/Layouts/`
  - Database: `database/migrations/`, `database/seeders/`
  - Build & scripts: `composer.json` (composer scripts) and `package.json` (npm/vite scripts)

- Big picture architecture:
  - Laravel serves API/SSR endpoints and Inertia responses. UI is built with Vue 3 + Element Plus and served via Vite.
  - Authentication uses Laravel Fortify (see `app/Actions/Fortify/` and config in `config/fortify.php`).
  - Queues and background workers are used in dev via `php artisan queue:listen` (see composer `dev` script).

- Developer workflows (exact commands):
  - Setup (recommended):
    - `composer run-script setup` (runs install, env copy, migrate, npm build)
  - Local dev (hot reload + background processes):
    - `composer run-script dev` (starts `php artisan serve`, queue listener, pail, and `npm run dev` concurrently)
    - or run separately: `php artisan serve` + `npm run dev`.
  - Build frontend: `npm run build` or `composer run-script setup` for full setup
  - Tests: `composer run-script test` or `php artisan test` (project uses Pest)

- Project-specific conventions & patterns to follow:
  - Inertia pages live in `resources/js/Pages/`. Controllers typically return `Inertia::render(...)`.
  - Forms in the frontend use Inertia `useForm` (search for `useForm` in `resources/js`).
  - Migrations are in `database/migrations/` — follow existing timestamped filenames when adding new migrations.
  - PSR-4 autoloading maps `App\\` => `app/` (see `composer.json`).
  - Use existing Element Plus components and the modal pattern in `resources/js/Components/` for CRUD dialogs.

- Integration & external dependencies to watch for:
  - Database: PostgreSQL (set in `.env`).
  - Auth: Laravel Fortify modifies login/register flows.
  - Frontend: Vite + laravel-vite-plugin; SSR is optionally supported via `dev:ssr` script.

- Where to look when making changes spanning backend + frontend:
  - Routing and page wiring: `routes/web.php` -> Controller -> `Inertia::render('PageName')` -> `resources/js/Pages/PageName.vue`
  - API endpoints: Controllers under `app/Http/Controllers/` and Eloquent models under `app/`.

- Tests & CI notes:
  - Tests use Pest located in `tests/`. Use `composer run-script test` or run `./vendor/bin/pest` directly.

- Quick examples (search for these to learn patterns):
  - Inertia response: search `Inertia::render` to find controller -> page mappings.
  - Form usage: search `useForm(` in `resources/js` to see form patterns and validation flows.
  - Queue/dev orchestration: inspect `composer.json` `dev` and `dev:ssr` scripts.

- When editing files:
  - Preserve controller method signatures and route names. Match page component names exactly to `Inertia::render` targets.
  - Add migrations with timestamped filenames and run `php artisan migrate` in local testing.

- If anything here is unclear or you want expanded examples (controller -> page walkthroughs, a PR template, or CI details), tell me which area to expand.
