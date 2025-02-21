<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/vendredi', function (){
    return view('vendredi');
});

Route::view('/services', 'services')->name('services');
Route::view('/about', 'about')->name('about');
Route::view('/team', 'team')->name('team');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/contact', 'contact')->name('contact');
Route::get('/blog', [HomeController::class, 'blog'])->name('contact');