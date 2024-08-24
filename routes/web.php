<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload');
});

// Route::get('/signup', function () {
//     return view('signup');
// });

//Route::get('/upload',FileUploadController::class,'index')->name('upload');
Route::post('/uploadImage',[FileUploadController::class,'uploads'])->name('uploadImage');

Route::get('/display', [ImageController::class,'display'])->name('display');

Route::get('/upload', [ImageController::class,'index'])->name('upload');

Route::get('/edit/{id}', [FileUploadController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [FileUploadController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [FileUploadController::class, 'destroy'])->name('delete');

Route::get('/signup',[SignupController::class,'showForm'])->name('signup.form');

Route::post('/signup', [SignupController::class,'store'])->name('signup.store');