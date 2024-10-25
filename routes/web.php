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
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
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
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar','rs','ch'])) { // Only 'en' and 'ar' for English and Arabic
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.change');
Route::view('/welcome', 'welcome');
Route::get('/', [TutorController::class, 'index'])->name('newhome');
Route::get('/basicsignup', function () {
    return view('basicsignup');
})->name('basicsignup');
Route::get('/enter-email', function() {
    return view('emailVerification');
})->name('enter.email');
Route::get('/debug-session', function () {
    return session()->all(); // Display all session data
})->middleware('auth');
Route::get('/notifications/mark-read', [NotificationController::class, 'markNotificationAsRead'])->name('mark.notifications.read');

// Route to send verification email
Route::post('/send-verification-email', [VerificationController::class, 'sendVerificationEmail'])->name('send.verification.email');

// Protected route for tutor signup (requires email verification)
Route::middleware(['check.email.verified'])->group(function () {
    Route::get('/tutor-signup', [TutorController::class, 'signup'])->name('tutor');
});
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/hire-tutor', [StudentController::class, 'index'])->name('hire.tutor');
Route::get('/faq', [StudentController::class, 'FAQ'])->name('faq.index');
Route::resource('blogs', BlogController::class);
Route::get('/cities', [StudentController::class, 'getCities'])->name('cities');
Route::get('/all-blogs', [TutorController::class, 'allBlogs'])->name('all.blogs');
Route::post('/update-tutor-status', [TutorController::class, 'updateTutorStatus'])->name('update.tutor.status');
Route::delete('/teachers/destroy-bulk', [TutorController::class, 'destroyBulk'])->name('teachers.destroy.bulk');
Route::delete('/student/destroy-bulk', [StudentController::class, 'destroystudentBulk'])->name('student.destroy.bulk');
Route::delete('/inquiry/destroy-bulk', [StudentController::class, 'destroyinquiryBulk'])->name('inquiry.destroy.bulk');
Route::get('/policy', [StudentController::class, 'privacyPolicy'])->name('policy.index');
Route::get('/terms', [StudentController::class, 'termsCondition'])->name('terms.condition');
Route::get('/tutor-detail', [TutorController::class, 'tutorDetail'])->name('tutor.detail');
// Route for finding tutors based on selected country
Route::get('/find-tutors', [TutorController::class, 'findTutors'])->name('find.tutors');
Route::get('/all-tutors', [TutorController::class, 'allTutors'])->name('all.tutors');

Route::get('/qr-code', [StudentController::class, 'qrcode'])->name('qrcode');
Route::post('/hire-tutor/create', [StudentController::class, 'create'])->name('student-create');
Route::post('/inquiry/create', [StudentController::class, 'inquiry'])->name('inquiry-create');
Route::get('/student-list/{id}/edit', [StudentController:: class, 'edit'])->name('edit-student');
Route::put('/student-list/{id}', [StudentController:: class, 'update'])->name('students.update');
Route::delete('/student-list/{id}', [StudentController:: class, 'destroy'])->name('students.destroy');
Route::post('/tutor/create', [TutorController::class, 'create'])->name('tutor-create');
Route::get('/tutors', [TutorController::class, 'filterByCountry'])->name('tutors.filterByCountry');
Route::get('/students-list', [StudentController::class, 'showStudentsList'])->name('students.list');
Route::get('/inquiries-list', [StudentController::class, 'inquiriesList'])->name('inquiries.list');
Route::get('/students-pdf', [StudentController::class, 'studentsPDF'])->name('students.pdf');
Route::get('/teachers-list', [TutorController::class, 'fetchTeachers'])->name('teachers.list');
Route::get('/teachers-list/{id}/edit', [TutorController::class, 'edit'])->name('edit-teacher');
Route::put('/teachers-list/{id}', [TutorController::class, 'update'])->name('teachers.update');
Route::delete('/teachers-list/{id}', [TutorController::class, 'destroy'])->name('teachers.destroy');
Route::post('/fetch-data', [TutorController::class, 'fetchData'])->name('fetch-data');
Route::get('/school-classes', [StudentController::class, 'indexClasses']);
Route::get('/subjects/{schoolClassId}', [StudentController::class, 'getSubjects']);
// routes/web.php
// routes/web.php


Route::get('/verify-email', [VerificationController::class, 'show'])->name('verification.notice');
Route::post('/send-verification-link', [VerificationController::class, 'sendLink'])->name('verification.send');
Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hiring', [App\Http\Controllers\HomeController::class, 'hiring'])->name('hiring-tutor');
Route::get('/student-hiring', [App\Http\Controllers\HomeController::class, 'studenthiring'])->name('students-listing');
