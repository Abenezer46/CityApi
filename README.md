# City REST API (Laravel 12 -- In-Memory CRUD)

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue)
![License](https://img.shields.io/badge/License-MIT-green)

A simple **RESTful API** built with **Laravel 12** that manages a
**City** resource using an **in-memory array** (no database).

This repository is intended for **learning, demos, interviews, and
technical assessments**.

------------------------------------------------------------------------

## 📌 Project Overview

-   Framework: Laravel 12
-   Storage: In-memory array (no DB)
-   API Type: REST
-   Data Format: JSON

⚠️ Data resets on every request (expected behavior).

------------------------------------------------------------------------

## 📂 Project Structure (Relevant Parts)

    app/Http/Controllers/Api/CityController.php
    routes/api.php
    bootstrap/app.php

------------------------------------------------------------------------

## 🚀 Getting Started

### 1️⃣ Clone the repository

``` bash
git clone https://github.com/Abenezer46/city-api.git
cd city-api
```

### 2️⃣ Install dependencies

``` bash
composer install
```

### 3️⃣ Start the development server

``` bash
php artisan serve
```

Server will run at:

    http://127.0.0.1:8000

------------------------------------------------------------------------

## 🛣️ API Routing (Laravel 12)

Laravel 12 does **not include `routes/api.php` by default**.

### Create `routes/api.php`

``` php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;

Route::get('/cities', [CityController::class, 'index']);
Route::get('/cities/{id}', [CityController::class, 'show']);
Route::post('/cities', [CityController::class, 'store']);
Route::put('/cities/{id}', [CityController::class, 'update']);
Route::delete('/cities/{id}', [CityController::class, 'destroy']);
```

### Register API routes

Edit `bootstrap/app.php`:

``` php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
```

Clear cache:

``` bash
php artisan optimize:clear
```

------------------------------------------------------------------------

## 📡 API Endpoints

Base URL:

    http://127.0.0.1:8000/api

  Method   Endpoint       Description
  -------- -------------- -----------------
  GET      /cities        List all cities
  GET      /cities/{id}   Get city by ID
  POST     /cities        Create a city
  PUT      /cities/{id}   Update a city
  DELETE   /cities/{id}   Delete a city

------------------------------------------------------------------------

## 🧪 Example Request

``` bash
POST /api/cities
```

``` json
{
  "name": "Addis Ababa",
  "country": "Ethiopia"
}
```

------------------------------------------------------------------------

## ❗ Important Notes

-   No database or migrations
-   Data stored in memory
-   Ideal for:
    -   Learning Laravel APIs
    -   Interviews
    -   Code samples
    -   Prototyping

------------------------------------------------------------------------

## 📈 Future Improvements

-   Database persistence
-   API Resources
-   Authentication (Laravel Sanctum)
-   Feature & unit tests

------------------------------------------------------------------------

## 👤 Author

**Abenezer Demissie**\
![Gmail](https://img.shields.io/badge/Gmail-AbenezerDemissie123@gmail.com-blue)
![LinkedIn](https://img.shields.io/badge/LinkedIn-AbenezerDemissie123-blue)
![Telegram](https://img.shields.io/badge/Telegram-@AbenezerDemissie123-blue)

------------------------------------------------------------------------

## 📄 License

This project is licensed under the MIT License.
