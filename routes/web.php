<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CsvController;

Route::get('upload', [CsvController::class, 'showForm'])->name('upload.form');
Route::post('upload', [CsvController::class, 'upload'])->name('upload.post');
Route::get('contacts', [CsvController::class, 'index'])->name('contacts.index');

Route::get('/', function () {
    return view('welcome');
});
