<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });



use Illuminate\Support\Facades\Auth;
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
Route::get('/', [TutorController::class, 'index'])->name('newhome');
Route::get('/basicsignup', function () {
    return view('basicsignup');
})->name('basicsignup');

Route::get('/tutor-signup', function () {
    return view('tutor-signup');
})->name('tutor');
Route::get('/hire-tutor', [StudentController::class, 'index'])->name('hire.tutor');
Route::post('/hire-tutor/create', [StudentController::class, 'create'])->name('student-create');
Route::get('/student-list/{id}/edit', [StudentController:: class, 'edit'])->name('edit-student');
Route::put('/student-list/{id}', [StudentController:: class, 'update'])->name('students.update');
Route::delete('/student-list/{id}', [StudentController:: class, 'destroy'])->name('students.destroy');
Route::post('/tutor/create', [TutorController::class, 'create'])->name('tutor-create');
Route::get('/tutors', [TutorController::class, 'filterByCountry'])->name('tutors.filterByCountry');
Route::get('/students-list', [StudentController::class, 'showStudentsList'])->name('students.list');
Route::get('/students-pdf', [StudentController::class, 'studentsPDF'])->name('students.pdf');
Route::get('/teachers-list', [TutorController::class, 'fetchTeachers'])->name('teachers.list');
Route::get('/teachers-list/{id}/edit', [TutorController::class, 'edit'])->name('edit-teacher');
Route::put('/teachers-list/{id}', [TutorController::class, 'update'])->name('teachers.update');
Route::delete('/teachers-list/{id}', [TutorController::class, 'destroy'])->name('teachers.destroy');
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

    Route::get('/tutor-signup', [TutorController::class, 'signup'])->name('tutor');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
