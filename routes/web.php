<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/admin', function(){
    return view('admin.index');
})->name('admin.index');


Route::prefix('admin/')->name('admin.')->middleware('web')->group(function(){
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/categories', [PageController::class, 'category'])->name('category');
Route::get('/single-news/{news}', [PageController::class, 'singleNews'])->name('singleNews');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
