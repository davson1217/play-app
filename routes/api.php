<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('register', [UserController::class, 'register']);

Route::get('/', function (Request $request) {
    return "Hello from Play App!!!";
});

Route::controller(UserController::class)->group(function () {
   Route::post('register', 'register');
   Route::post('login', 'login');
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
