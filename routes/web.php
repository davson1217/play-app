<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SampleController;
use \App\Http\Controllers\StoreController;

Route::controller(SampleController::class)->group(function () {
    Route::get('/bfGames', 'bfGames');
});

Route::controller(StoreController::class)->group(function () {
//    Route::get('/', 'index');// a landing page that offers login/registration routing
    Route::match(['get', 'post'], '/register', ['registrationForm', 'register']);// shared web design specifically for registration
    Route::match(['get', 'post'], '/login', ['loginForm', 'login']);// shared web design specifically for login

    //Maybe create a dashboard controller.
    //These routes should be protected/authenticated before access.
    Route::middleware('auth-middleware')->group(function () {
        //show all products with ability to Add new Product on the same page.
        Route::get('/home', 'home');
        // View specific product with ability to Update/Delete a product.
    });
});
