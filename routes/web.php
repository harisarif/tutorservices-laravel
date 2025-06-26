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


use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ZoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EdexcelComplaintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
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

Route::post('/cookie-consent', function (Request $request) {
    $consent = $request->input('consent');
    return response('OK')->cookie('cookie_consent', $consent, 60 * 24 * 365); // 1 year
});
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar', 'rs', 'ch'])) { // Only 'en' and 'ar' for English and Arabic
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.change');
Route::view('/welcome', 'welcome');
Route::get('/login-new', [App\Http\Controllers\StudentController::class, 'LoginPage'])
    ->name('LoginPage.new');
Route::get('/basicsignup', function () {
    return view('basicsignup');
})->name('basicsignup');
Route::get('/enter-email', function () {
    return view('emailVerification');
})->name('enter.email');
Route::get('/debug-session', function () {
    return session()->all(); // Display all session data
})->middleware('auth', 'auto-logout');
Route::get('/notifications/mark-read', [NotificationController::class, 'markNotificationAsRead'])->name('mark.notifications.read');

// Route to send verification email
Route::post('/send-verification-email', [VerificationController::class, 'sendVerificationEmail'])->name('send.verification.email');
Route::post('/verify-otp', [VerificationController::class, 'verifyOtp'])->name('verify-otp');

// Protected route for tutor signup (requires email verification)
Route::post('/logout/teacher/{id}', [TutorController::class, 'logoutTeacher'])->name('logout.teacher');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Tutor Controllers
// Route::middleware(['check.email.verified'])->group(function () {
Route::get('/tutor-signup',  function () {
    return view('emailVerification');
})->name('tutor');
// });
Route::get('/inquiries-list-testing', [EdexcelComplaintController::class, 'inquiriesListTest'])->name('inquiries.listtesting');
Route::get('/', [TutorController::class, 'index'])->name('newhome');
Route::get('/tutor-signup/email-verified', [VerificationController::class, 'signup'])->name('tutor-signup');
Route::get('/all-blogs', [TutorController::class, 'allBlogs'])->name('all.blogs');
Route::post('/update-tutor-status', [TutorController::class, 'updateTutorStatus'])->name('update.tutor.status');
Route::delete('/teachers/destroy-bulk', [TutorController::class, 'destroyBulk'])->name('teachers.destroy.bulk');
Route::get('/tutor-detail', [TutorController::class, 'tutorDetail'])->name('tutor.detail');
// Route for finding tutors based on selected country
Route::get('/find-tutors', [TutorController::class, 'findTutors'])->name('find.tutors');
Route::get('/all-tutors', [TutorController::class, 'allTutors'])->name('all.tutors');
Route::post('/tutor/create', [TutorController::class, 'create'])->name('tutor-create');
Route::get('/tutors', [TutorController::class, 'filterByCountry'])->name('tutors.filterByCountry');

Route::get('/teachers-list/{id}/view', [TutorController::class, 'show'])->name('view-teacher');
// document
Route::get('/teachers-list/{id}/view/document', [TutorController::class, 'view'])->name('view_document');
Route::get('/teacher-dashboard/{id}', [TutorController::class, 'teacher_dashboard'])
    ->name('teacher_dashboard')
    ->middleware('auth', 'auto-logout');
Route::get('/teachers-dashboard-list', [TutorController::class, 'fetchAuthTeacher'])->name('teachers.dashboard.list');
Route::get('/teachers-list-edit/{id}', [TutorController::class, 'frontEdit'])->name('front-edit-teacher');
Route::get('/teachers-list/{id}/edit', [TutorController::class, 'edit'])->name('edit-teacher');
Route::put('/teachers-list-update/{id}', [TutorController::class, 'updateTeacherProfile'])->name('teacher.update');
Route::put('/teachers-list/{id}', [TutorController::class, 'updateProfile'])->name('teachers.update');
Route::delete('/teachers-list/{id}', [TutorController::class, 'destroy'])->name('teachers.destroy');
Route::post('/fetch-data', [TutorController::class, 'fetchData'])->name('fetch-data');
Route::get('/checkout/{id}', [TutorController::class, 'checkout'])->name('checkout.delete');
Route::post('/fetch-data/student', [StudentController::class, 'fetchData'])->name('fetch-student');
Route::post('/tutor/{tutorId}/assign-student/{studentId}', [TutorController::class, 'assignStudent']);
Route::get('/tutor/{tutorId}/students', [TutorController::class, 'getStudents']);
Route::get('/student/{studentId}/tutors', [TutorController::class, 'getTutors']);
Route::post('/fetch/student', [TutorController::class, 'fetchStudentData'])->name('fetch-stduent-data');
// Student Controller 
Route::get('/hire-tutor', [StudentController::class, 'index'])->name('hire.tutor');
Route::get('/faq', [StudentController::class, 'FAQ'])->name('faq.index');

Route::get('/cities', [StudentController::class, 'getCities'])->name('cities');
Route::get('/get-cities', [StudentController::class, 'cities'])->name('get.country.cities');

Route::delete('/inquiries/{id}', [StudentController::class, 'destroy'])->name('inquiries.destroy');
Route::get('/notification/view/{id}', [NotificationController::class, 'view'])->name('notification.view');

Route::delete('/student/destroy-bulk', [StudentController::class, 'destroystudentBulk'])->name('student.destroy.bulk');
Route::delete('/inquiry/destroy-bulk', [StudentController::class, 'destroyinquiryBulk'])->name('inquiry.destroy.bulk');
Route::get('/policy', [StudentController::class, 'privacyPolicy'])->name('policy.index');
Route::get('/terms', [StudentController::class, 'termsCondition'])->name('terms.condition');

Route::get('/test-socialite', function () {
    return Socialite::driver('google')->stateless()->redirect();
});
Route::post('/change-password', [SocialAuthController::class, 'changePassword'])->name('change.password');
Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

Route::get('/all-students', [StudentController::class, 'allStudents'])->name('all.students');
Route::get('/qr-code', [StudentController::class, 'qrcode'])->name('qrcode');
Route::post('/hire-tutor/create', [StudentController::class, 'viewHire'])->name('student-view');
Route::post('/hire-tutor/create/', [StudentController::class, 'create'])->name('student-create');
// Route::post('/hire-tutor/create/{id}', [StudentController::class, 'create'])->name('student-create');
Route::post('/hire-tutor-new/create', [StudentController::class, 'newcreate'])->name('newstudent-create');
Route::post('/inquiry/create', [EdexcelComplaintController::class, 'createComplaints'])->name('inquiry-create');
Route::get('/student-list/{id}/edit', [StudentController::class, 'edit'])->name('edit-student');
Route::get('/inqury-list/{id}', [EdexcelComplaintController::class, 'edit'])->name('inqury.edit');
Route::delete('/student-list/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::put('/student-list/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('/students-list', [StudentController::class, 'showStudentsList'])->name('students.list');
Route::get('/inquiries-list', [EdexcelComplaintController::class, 'inquiriesList'])->name('inquiries.list');
Route::get('/students-pdf', [StudentController::class, 'studentsPDF'])->name('students.pdf');
Route::put('/inquiry-list/{id}', [EdexcelComplaintController::class, 'update'])->name('inquiry.update');
Route::get('/school-classes', [StudentController::class, 'indexClasses']);
Route::get('/subjects/{schoolClassId}', [StudentController::class, 'getSubjects']);
Route::delete('/inquiry-destroy/{id}', [EdexcelComplaintController::class, 'destroy'])->name('inquiry.destroy');

Route::get('/auth/redirect/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');


// routes/web.php
// routes/web.php
Route::get('/blog-list/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::resource('blogs', BlogController::class);
Route::put('/blogs-edit-list/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blog/destroy-bulk', [BlogController::class, 'destroyBulk'])->name('blogs.destroy.bulk');
Route::get('/verify-email', [VerificationController::class, 'show'])->name('verification.notice');
Route::post('/send-verification-link', [VerificationController::class, 'sendLink'])->name('verification.send');
Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/check-email', [VerificationController::class, 'checkEmail'])->name('check.email');
Route::get('/inquiry/{id}', [EdexcelComplaintController::class, 'show'])->name('inqury.show');
Route::get('/notifications', [NotificationController::class, 'index'])->name('admin.notifications');
Route::delete('/notifications/bulk-delete', [NotificationController::class, 'bulkDelete'])->name('notifications.destroy.bulk');
Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
Route::get('notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
Route::post('/request-tutor/{id}', [StudentController::class, 'sendTutorRequest'])->name('request.tutor');
Route::get('/notifications/mark-all-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('notifications.markAllRead');

Route::get('/auth/redirect/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/callback/{provider}', [SocialAuthController::class, 'callback']);
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'auto-logout'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'auto-logout'])
    ->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('/resend-verification-session', [VerificationController::class, 'resendVerificationEmailFromSession']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/teachers-list', [TutorController::class, 'fetchTeachers'])->name('teachers.list');
});
Route::post('/newsletter/create', [EdexcelComplaintController::class, 'createNewsletter'])->name('newsletter-create');
Route::post('/request-demo', [StudentController::class, 'send'])
    ->middleware(['auth']) // ensure user is logged in
    ->name('request.demo');
Auth::routes();

Route::post('/tutors/{id}/update-status', [TutorController::class, 'updateStatus'])->name('tutors.updateStatus');

Route::get('/student-dashboard/{id}', [StudentController::class, 'student_dashboard'])
    ->name('student_dashboard')
    ->middleware('auth', 'auto-logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(['auth', 'admin.only']);
Route::get('/inquiry-list', [App\Http\Controllers\HomeController::class, 'inquiry'])->name('admin.inquiry');
Route::get('/hiring', [App\Http\Controllers\HomeController::class, 'hiring'])->name('hiring-tutor');
Route::get('/student-hiring', [App\Http\Controllers\HomeController::class, 'studenthiring'])->name('students-listing');
Route::get('/zoom/login', [ZoomController::class, 'redirectToZoom'])->name('zoom.login');
Route::get('/zoom/callback', [ZoomController::class, 'handleZoomCallback'])->name('zoom.callback');
Route::get('/zoom/create-meeting', [ZoomController::class, 'createMeeting'])->name('zoom.create.meeting');
Route::get('/zoom/send-meeting-email', [ZoomController::class, 'sendMeetingEmail'])->name('zoom.send.meeting.email');
Route::post('/zoom/create-meeting', [ZoomController::class, 'createAndMailMeeting'])
    ->name('zoom.create.meeting');
Route::post('/zoom/create-and-send', [ZoomController::class, 'createMeetingAndSendEmail'])->name('zoom.create_and_send');
