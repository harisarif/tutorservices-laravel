<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\StudentController;
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

Route::view('/welcome', 'welcome');
Route::get('/', [TutorController::class, 'index'])->name('home');
Route::get('/basicsignup', function () {
    return view('basicsignup');
})->name('basicsignup');

Route::get('/tutor-signup', function () {
    return view('tutor-signup');
})->name('tutor');
Route::get('/hire-tutor', [StudentController::class, 'index'])->name('hire.tutor');
Route::post('/hire-tutor/create', [StudentController::class, 'create'])->name('student-create');
Route::post('/tutor/create', [TutorController::class, 'create'])->name('tutor-create');
Route::get('/tutors', [TutorController::class, 'filterByCountry'])->name('tutors.filterByCountry');
Route::post('/fetch-data', [TutorController::class, 'fetchData'])->name('fetch-data');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

require __DIR__.'/auth.php';
