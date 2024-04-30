<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::get('/', [TutorController::class, 'index'])->name('home');
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/tutor-signup', function () {
    return view('tutor-signup');
})->name('tutor');
Route::post('/tutor/create', [TutorController::class, 'create'])->name('tutor-create');
Route::get('/tutors', [TutorController::class, 'filterByCountry'])->name('tutors.filterByCountry');
Route::post('/fetch-data', [TutorController::class, 'fetchData'])->name('fetch-data');

