<?php
use App\Http\Controllers\Auth\LogoutController;
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
Route::view('/profile','profile');
Route::view('/profileupdate','profileupdate');
Route::post('/updateprofile',[User::class,'updateprofile']);
Route::view('/changeadminpass','adminpassword');
Route::post('/adminpassword',[User::class,'adminpassword']);
Route::get('/logout', [LogoutController::class, 'logout']);
Route::post('/getUsersAjax', [User::class, 'getUsersAjax']);






