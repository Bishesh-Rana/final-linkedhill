<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\LoginController;

Route::get('/login',[LoginController::class,'loginForm'])->name('company.login.form');
Route::post('/login',[LoginController::class,'login'])->name('company.login');