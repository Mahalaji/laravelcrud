<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/register','register');
Route::post('/adduser',[User::class,'adduser']);
Route::view('/login','login');
Route::post('/loginvalidation',[User::class,'loginvalidation']);
Route::view('/dashboard','dashboard');

