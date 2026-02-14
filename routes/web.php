<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');    // url
Route::resource('users', UserController::class);
//*** my example Route
Route::get('/userspaginate', [UserController::class, 'indexPaginate'])->name('users.indexPaginate');
Route::get('/my', [MyHomeController::class, 'index'])->name('myhome.index');
Route::get('/myform', [MyHomeController::class, 'indexForm'])->name('myhome.indexForm');
